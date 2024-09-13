<?php

namespace App\Http\Controllers;

use App\Models\Kategoriprogram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class KategoriprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $nama_kategori = $request->nama_kategori;

        $query = Kategoriprogram::query();

        if (!empty($search)) {
            $query->where('nama_kategori', 'like', "%$search%");
        }

        if (!empty($nama_kategori)) {
            $query->where('nama_kategori', $nama_kategori);
        }

        $kategoriprograms = $query->paginate(10);

        $nama_kategoris = Kategoriprogram::select('nama_kategori')
                    ->groupBy('nama_kategori')
                    ->get();

        return view('administrator.kategoriprogram.index', compact(['kategoriprograms', 'nama_kategoris']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $kategoriprograms = Kategoriprogram::all();
        return view('administrator.kategoriprogram.create', compact(['kategoriprograms']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'nama_kategori' => 'required|string|max:255',
        ]);

        $nama_kategori = $validatedData['nama_kategori'];
        $gambarName = $validatedData['gambar']->getClientOriginalName();
        $validatedData['gambar']->move("./kategori_program", $gambarName);

        Kategoriprogram::create([
            "nama_kategori" => $nama_kategori,
            "gambar" => $gambarName
        ]);

        return response()->json([
            'url' => route('administrator.kategoriprogram.index'),
            'success' => true,
            'message' => 'Data Kategori Program Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_kategori_program)
    {
        //
        $kategoriprograms = Kategoriprogram::findOrFail($id_kategori_program);

        return view('administrator.kategoriprogram.edit', compact('kategoriprograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_kategori_program)
    {
        $kategoriprograms = Kategoriprogram::findOrFail($id_kategori_program);

        $nama_kategori = $request->nama_kategori;
        $gambar = $request->file("gambar");

        $updateData = [
            'nama_kategori' => $nama_kategori,
        ];

        if ($gambar) {
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./kategori_program", $gambarName);
            $updateData['gambar'] = $gambarName;

            // Menghapus gambar lama jika ada
            if ($kategoriprograms->gambar) {
                $path = "./kategori_program/" . $kategoriprograms->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $kategoriprograms->update($updateData);

        return response()->json([
            'url' => route('administrator.kategoriprogram.index'),
            'success' => true,
            'message' => 'Data Kategori Program Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_kategori_program)
    {
        $kategoriprograms = Kategoriprogram::findOrFail($id_kategori_program);
        $kategoriprograms->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
