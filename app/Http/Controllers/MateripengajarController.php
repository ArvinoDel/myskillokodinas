<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Payment;
use App\Models\Isimateri;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Berlangganan;
use Illuminate\Http\Request;
use App\Models\Kategoriprogram;
use App\Models\Topik;
use App\Models\Trainer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk mengatasi undefined type Log

class MateripengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $nama_materi = $request->nama_materi;
        $id_kategori_program = $request->id_kategori_program;
        $id_topik = $request->id_topik;

        // Ambil ID pengajar yang sedang login
        if (Auth::user()->level == 'pengajar') {
            $id_pengajar = Auth::user()->id;
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Query untuk mengambil materi berdasarkan id_pengajar (filter via Trainer)
        $query = Materi::with(['trainer', 'kategoriprogram', 'topik']) // Eager load relasi
            ->whereHas('trainer', function ($q) use ($id_pengajar) {
                $q->where('id', $id_pengajar); // Filter berdasarkan id_pengajar
            });

        // Filter tambahan berdasarkan input
        if (!empty($search)) {
            $query->where('nama_materi', 'like', "%$search%");
        }

        if (!empty($nama_materi)) {
            $query->where('nama_materi', $nama_materi);
        }

        if (!empty($id_kategori_program)) {
            $query->where('id_kategori_program', $id_kategori_program);
        }

        if (!empty($id_topik)) {
            $query->where('id_topik', $id_topik);
        }

        $materis = $query->paginate(10);
        $kategoriprograms = Kategoriprogram::all();
        $topiks = Topik::all();

        $nama_materis = Materi::select('nama_materi')
            ->whereHas('trainer', function ($q) use ($id_pengajar) {
                $q->where('id', $id_pengajar); // Filter untuk nama_materis
            })
            ->groupBy('nama_materi')
            ->get();

        return view('pengajar.materi.index', compact(['materis', 'nama_materis', 'kategoriprograms', 'topiks']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = Trainer::all();
        $kategoriprograms = Kategoriprogram::all();
        $topiks = Topik::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('pengajar.materi.create', compact('trainers', 'kategoriprograms', 'topiks'));
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
            'id_trainer' => 'nullable|exists:trainer,id_trainer',
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
            'id_trainer' => $request->id_trainer,
            'thumbnail' => $gambarName
        ]);

        return response()->json([
            'url' => route('pengajar.materi.index'),
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
        $trainers = Trainer::all();
        $kategoriprograms = Kategoriprogram::all();
        $topiks = Topik::all();
        return view('pengajar.materi.edit', compact('trainers', 'materis', 'kategoriprograms', 'topiks'));
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
            'id_trainer' => $request->id_trainer,
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
            'url' => route('pengajar.materi.index'),
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

}
