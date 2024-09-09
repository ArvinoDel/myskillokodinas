<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        $tanggal = $request->tanggal;

        $mitras = Mitra::query();

        if (!empty($search)) {
            $mitras->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $mitras->where('judul', $judul);
        }

        $programs = $mitras->paginate(10);

        return view('administrator.mitra.index', compact(['mitras']));
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
