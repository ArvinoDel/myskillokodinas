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

        $kategoriprogram = $query->paginate(10);

        $nama_kategoris = Kategoriprogram::select('nama_kategori')
                    ->groupBy('nama_kategori')
                    ->get();

        return view('administrator.kategoriprogram.index', compact(['kategoriprogram', 'nama_kategoris']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $kategoriprogram = Kategoriprogram::all();
        return view('administrator.kategoriprogram.create', compact(['kategoriprogram']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama_kategori = $request->nama_kategori;

        Kategoriprogram::create([
            "nama_kategori" => $nama_kategori,
            "id_kategori" => md5($nama_kategori.'-'.date('YmdHis'))
        ]);

        return response()->json([
            'url' => route('administrator.kategoriprogram.index'),
            'success' => true,
            'message' => 'Data Kategori Program Berhasil Diperbarui'
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
    public function edit(string $id)
    {
        //
        $kategoriprogram = Kategoriprogram::findOrFail($id);

        return view('administrator.kategoriprogram.edit', compact('kategoriprogram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategoriprogram = Kategoriprogram::findOrFail($id);

        $nama_kategori = $request->nama_kategori;

        $updateData = [
            'nama_kategori' => $nama_kategori,
        ];

        $kategoriprogram->update($updateData);

        return response()->json([
            'url' => route('administrator.kategoriprogram.index'),
            'success' => true,
            'message' => 'Data Kategori Program Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoriprogram = Kategoriprogram::findOrFail($id);
        $kategoriprogram->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
