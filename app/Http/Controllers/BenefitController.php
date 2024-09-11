<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $tanggal = $request->tanggal;

        $query = Benefit::query();

        if (!empty($search)) {
            $query->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $benefits = $query->paginate(10);

        return view('administrator.benefit.index', compact(['benefits']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.benefit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_benefit' => 'required|string|max:255',
        ]);

        $benefit = Benefit::create($validatedData);

        return response()->json([
            'url' => route('administrator.benefit.index'),
            'success' => true,
            'message' => 'Data benefit Berhasil Ditambah'
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
        $bene = Benefit::findorfail($id);
        return view('administrator.benefit.edit', compact('bene'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_benefit)
    {
        //
        $validatedData = $request->validate([
            'nama_benefit' => 'required|string|max:255',
        ]);

        $benefit = Benefit::findorfail($id_benefit);
        $benefit->update($validatedData);

        return response()->json([
            'url' => route('administrator.benefit.index'),
            'success' => true,
            'message' => 'Data benefit Berhasil Diubah'
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_benefit)
    {
        //
        $benef = Benefit::findOrFail($id_benefit);
        $benef->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
