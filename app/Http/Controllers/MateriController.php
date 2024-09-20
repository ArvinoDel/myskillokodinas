<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Isimateri;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Berlangganan;
use Illuminate\Http\Request;
use App\Models\Kategoriprogram;
use App\Models\Topik;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk mengatasi undefined type Log

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $nama_materi = $request->nama_materi;
        $id_kategori_program = $request->id_kategori_program; // Tambahkan ini
        $id_topik = $request->id_topik; // Tambahkan ini

        $query = Materi::query(); // Tambahkan eager loading

        if (!empty($search)) {
            $query->where('nama_materi', 'like', "%$search%");
        }

        if (!empty($nama_materi)) {
            $query->where('nama_materi', $nama_materi);
        }

        if (!empty($id_kategori_program)) { // Tambahkan ini
            $query->where('id_kategori_program', $id_kategori_program);
        }

        if (!empty($id_topik)) { // Tambahkan ini
            $query->where('id_topik', $id_topik);
        }

        $materis = $query->paginate(10);
        $kategoriprograms = Kategoriprogram::all();
        $topiks = Topik::all();

        // Ambil semua data kategori program
        // dd($kategoriprograms);
        $nama_materis = Materi::select('nama_materi')
            ->groupBy('nama_materi')
            ->get();

        return view('administrator.materi.index', compact(['materis', 'nama_materis', 'kategoriprograms', 'topiks']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriprograms = Kategoriprogram::all();
        $topiks = Topik::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('administrator.materi.create', compact('kategoriprograms', 'topiks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all());

        $request->validate([
            'nama_materi' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'id_kategori_program' => 'nullable|exists:kategori_program,id_kategori_program',
            'id_topik' => 'nullable|exists:topik,id_topik',
        ]);

        $gambarName = null;

        if ($request->hasFile('thumbnail')) {
            $gambar = $request->file("thumbnail");
            // $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambarName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $gambar->getClientOriginalName());
            $gambar->move("./thumbnail/", $gambarName);
        }

        Materi::create([
            'nama_materi' => $request->nama_materi,
            'id_kategori_program' => $request->id_kategori_program,
            'id_topik' => $request->id_topik,
            'thumbnail' => $gambarName
        ]);

        return response()->json([
            'url' => route('administrator.materi.index'),
            'success' => true,
            'message' => 'Data Materi Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_materi)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Ganti 'login' dengan nama rute login kamu
        }
        // Fetch the materi by id_materi
        $materi = Materi::with('isimateri')->where('id_materi', $id_materi)->firstOrFail();
        $materis = Materi::all();
        $user = Auth::user();
        $berlanggananss = Berlangganan::all();

        // Extract the IDs from the collection
        $berlanggananIds = $berlanggananss->pluck('id_berlangganan')->toArray();

        $payments = Payment::where(function ($query) use ($user, $berlanggananIds) {
            $query->whereIn('berlangganan_id', $berlanggananIds)
                ->where('status', 'completed')
                ->where(function ($query) use ($user) {
                    $query->where('contact', $user->email)
                        ->orWhere('contact', $user->phone);
                });
        })->first();

        // Debug output to check the result
        // dd($payments);
        // dd($berlanggananIds);


        if ($payments) {
            $vidActive = true;
        } else {
            $vidActive = false;
        }
        // Pass the fetched materi to the view
        return view('myskill.pages.e-learning.materi', compact('materi', 'materis', 'vidActive'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materis = Materi::findOrFail($id);

        $kategoriprograms = Kategoriprogram::all();
        $topiks = Topik::all();
        return view('administrator.materi.edit', compact('materis', 'kategoriprograms', 'topiks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $materis = Materi::findOrFail($id);

        $updateData = [
            'nama_materi' => $request->nama_materi,
            'id_kategori_program' => $request->id_kategori_program,
            'id_topik' => $request->id_topik,
        ];

        if ($request->hasFile('thumbnail')) {
            $gambar = $request->file("thumbnail");
            $gambarName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $gambar->getClientOriginalName());
            $gambar->move("./thumbnail/", $gambarName);

            // Menghapus gambar lama jika ada
            if ($materis->thumbnail) {
                $path = "./thumbnail/" . $materis->thumbnail;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $updateData['thumbnail'] = $gambarName;
        }

        $materis->update($updateData);

        return response()->json([
            'url' => route('administrator.materi.index'),
            'success' => true,
            'message' => 'Data Materi Berhasil Diperbarui'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materis = Materi::findOrFail($id);
        if ($materis->thumbnail) {
            $path = "./thumbnail/" . $materis->thumbnail;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $materis->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    // MateriController.php
    public function rate(Request $request, $id_materi)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $materi = Materi::findOrFail($id_materi);
        $user_id = auth()->id(); // Ambil ID user yang sedang login

        // Cek apakah user sudah memberikan rating
        if ($materi->rated_users && in_array($user_id, json_decode($materi->rated_users))) {
            return redirect()->back()->with('error', 'Anda sudah memberikan rating sebelumnya.');
        }

        // Tambahkan rating ke total rating
        $materi->rating += $request->input('rating');

        // Tambah jumlah user yang memberikan rating
        $materi->rating_count += 1;

        // Simpan user yang sudah memberikan rating
        $rated_users = json_decode($materi->rated_users, true) ?? [];
        $rated_users[] = $user_id;
        $materi->rated_users = json_encode($rated_users);

        // Simpan perubahan
        $materi->save();

        return redirect()->back()->with('success', 'Rating berhasil dikirim');
    }
}
