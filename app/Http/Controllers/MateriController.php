<?php

namespace App\Http\Controllers;

use App\Models\Isimateri;
use App\Models\Kategoriprogram;
use App\Models\Materi;
use App\Models\Program;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
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

        $materis = $query->paginate(10);
        $kategoriprograms = Kategoriprogram::all();

        // Ambil semua data kategori program
        // dd($kategoriprograms);
        $nama_materis = Materi::select('nama_materi')
            ->groupBy('nama_materi')
            ->get();

        return view('administrator.materi.index', compact(['materis', 'nama_materis', 'kategoriprograms']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriprograms = Kategoriprogram::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('administrator.materi.create', compact('kategoriprograms'));
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
        ]);

        $gambarName = null;

        if ($request->hasFile('thumbnail')) {
            $gambar = $request->file("thumbnail");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambar->move("./thumbnail/", $gambarName);
        }

        Materi::create([
            'nama_materi' => $request->nama_materi,
            'id_kategori_program' => $request->id_kategori_program,
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
        // Fetch the materi by id_materi
        $materi = Materi::with('isimateri')->where('id_materi', $id_materi)->firstOrFail();
        $materis = Materi::all();
    
        // Pass the fetched materi to the view
        return view('myskill.pages.e-learning.materi', compact('materi', 'materis'));
    }
    



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materis = Materi::findOrFail($id);

        $kategoriprograms = Kategoriprogram::all();
        return view('administrator.materi.edit', compact('materis', 'kategoriprograms'));
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
        ];

        if ($request->hasFile('thumbnail')) {
            $gambar = $request->file("thumbnail");
            $gambarName = $gambar->getClientOriginalName();
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
}
