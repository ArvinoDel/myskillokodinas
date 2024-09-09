<?php

namespace App\Http\Controllers;

use App\Models\Metodepembayaran;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MetodepembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): view
    {
        //
        $search = $request->search;
        $tanggal = $request->tanggal;

        $query = Metodepembayaran::query();

        if (!empty($search)) {
            $query->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $metodes = $query->paginate(10);

        return view('administrator.metodepembayaran.index', compact(['metodes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.metodepembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_metode/", $gambarName);
        }
        Metodepembayaran::create([
            "gambar" => $gambarName,
        ]);

        return response()->json([
            'url' => route('administrator.metodepembayaran.index'),
            'success' => true,
            'message' => 'Data Banner Home Berhasil Ditambah'
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
