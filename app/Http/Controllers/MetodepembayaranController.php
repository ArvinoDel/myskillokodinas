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
    public function index(Request $request):view
    {
        //
        $search = $request->search;
        $tanggal = $request->tanggal;

        $metodes = Metodepembayaran::query();

        if (!empty($search)) {
            $metodes->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $metodes->where('judul', $judul);
        }

        $programs = $metodes->paginate(10);

        return view('administrator.metodepembayaran.index', compact(['metodes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
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
