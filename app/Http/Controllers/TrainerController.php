<?php

namespace App\Http\Controllers;

use App\Models\Kategoriprogram;
use App\Models\Program;
use App\Models\Trainer;
use App\Models\Trainerprogramgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $nama_trainer = $request->nama_trainer;

        $query = Trainer::query();

        if (!empty($search)) {
            $query->where('nama_trainer', 'like', "%$search%");
        }

        if (!empty($nama_trainer)) {
            $query->where('nama_trainer', $nama_trainer);
        }

        $trainers = $query->paginate(10);

        $nama_trainers = Trainer::select('nama_trainer')
                    ->groupBy('nama_trainer')
                    ->get();

        return view('administrator.trainer.index', compact(['trainers', 'nama_trainers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $programs = Program::all();
        $kategoriprogram = Kategoriprogram::all();
        return view('administrator.trainer.create', compact('programs', 'kategoriprogram'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_trainer' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string',
        ]);

        $gambarName = null;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambar->move("./foto_trainer/", $gambarName);
        }

        Trainer::create([
            // 'id_trainer' => Str::uuid(),
            'nama_trainer' => $validated['nama_trainer'],
            'foto' => $gambarName,
            'link' => $validated['link'],
        ]);


        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Ditambah'
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
    public function edit(string $id_trainer)
    {
        //
        $trainers = Trainer::findOrFail($id_trainer);
        return view('administrator.trainer.edit', compact('trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_trainer)
    {
        //
        $trainers = Trainer::findOrFail($id_trainer);

        $nama_trainer = $request->nama_trainer;
        $link = $request->link;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_trainer/", $gambarName);
            $updateData['gambar'] = $gambarName;
        }

        $trainers->update([
            "nama_trainer" => $nama_trainer,
            "link" => $link,
        ]);

        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_trainer)
    {
        //
        $trainers = Trainer::findOrFail($id_trainer);
        $trainers->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
