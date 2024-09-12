<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        $search = $request->search;
        $tanggal = $request->tanggal;

        $query = Mitra::query();

        if (!empty($search)) {
            $query->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $mitras = $query->paginate(10);

        return view('administrator.mitra.index', compact(['mitras']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./mitra/", $gambarName);
        }
        Mitra::create([
            "gambar" => $gambarName,
        ]);

        return response()->json([
            'url' => route('administrator.mitra.index'),
            'success' => true,
            'message' => 'Data Mitra Berhasil Ditambah'
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
        $mit = Mitra::findorfail($id);
        return view('administrator.mitra.edit', compact('mit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $mitra = Mitra::find($id);
    
        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./mitra/", $gambarName);

            // Menghapus gambar lama jika ada
            if ($mitra->gambar) {
                $path = "./mitra/" . $mitra->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $mitra->update([
                "gambar" => $gambarName,
            ]);
        }
    
        return response()->json([
            'url' => route('administrator.mitra.index'),
            'success' => true,
            'message' => 'Data Menu Website Berhasil Diperbaharui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $mitra = Mitra::findOrFail($id);
        if ($mitra->gambar) {
            $path = "./mitra/" . $mitra->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $mitra->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
