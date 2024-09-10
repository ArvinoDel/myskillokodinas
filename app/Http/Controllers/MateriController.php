<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $judul_materi = $request->judul_materi;

        $query = Materi::query();

        if (!empty($search)) {
            $query->where('judul_materi', 'like', "%$search%");
        }

        if (!empty($judul_materi)) {
            $query->where('judul_materi', $judul_materi);
        }

        $materis = $query->paginate(10);

        $judul_materis = Materi::select('judul_materi')
                    ->groupBy('judul_materi')
                    ->get();

        return view('administrator.materi.index', compact(['materis', 'judul_materis']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $judul_materi = $request->judul_materi;

        Materi::create([
            'judul_materi' => $judul_materi,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materis = Materi::findOrFail($id);
        return view('administrator.materi.edit', compact('materis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materis = Materi::findOrFail($id);

        $judul_materi = $request->judul_materi;

        $materis->update([
            "judul_materi" => $judul_materi
        ]);

        return response()->json([
            'url' => route('administrator.materi.index'),
            'success' => true,
            'message' => 'Data Testimoni Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materis = Materi::findOrFail($id);
        $materis->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
