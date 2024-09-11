<?php

namespace App\Http\Controllers;

use App\Models\Kategoriprogram;
use App\Models\Kategoriprogramgroup;
use App\Models\Program;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $tanggal = $request->tanggal;

        $query = Program::query();

        if (!empty($search)) {
            $query->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $programs = $query->paginate(10);

        $tanggals = Program::select('tanggal')
                    ->groupBy('tanggal')
                    ->get();

        return view('administrator.program.index', compact(['programs', 'tanggals']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategoriprograms = Kategoriprogram::all();
        $trainers = Trainer::all();
        return view('administrator.program.create', compact(['kategoriprograms', 'trainers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'judul_program' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $harga = $request->harga;
        $keterangan = $request->keterangan;

        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName =$gambar->getClientOriginalName();
            $gambar->move("./foto_program/", $gambarName);
        }

        Program::create([
            "judul_program" => $validated['judul_program'],
            "id_trainer" => $request->id_trainer,
            "id_kategori_program" => $request->id_kategori_program,
            "harga" => $harga,
            "keterangan" => $keterangan,
            "tanggal" => now(),
            "gambar" => $gambarName,
        ]);


        return response()->json([
            'url' => route('administrator.program.index'),
            'success' => true,
            'message' => 'Data Program Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_program, $id_trainer, $id_kategori_program)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_program):View
    {
        $programs = Program::where('id_program', $id_program)->firstOrFail();
        $kategoriprograms = Kategoriprogram::all(); // Tambahkan ini
        $trainers = Trainer::all();

        return view('administrator.program.edit', compact('programs', 'kategoriprograms', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_program)
    {
        $programs = Program::findOrFail($id_program);

        $nama_program = $request->nama_program;
        $judul = $request->judul;
        $harga = $request->harga;
        $keterangan = $request->keterangan;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_berita/", $gambarName);
            $programs->gambar = $gambarName;
        }

        $programs->update([
            "id_trainer" => $request->id_trainer,
            "id_kategori_program" => $request->id_kategori_program,
            "nama_program" => $nama_program,
            "keterangan" => $keterangan,
            "harga" => $harga,
            "judul" => $judul,
            "tanggal" => now(),
        ]);

        return response()->json([
            'url' => route('administrator.program.index'),
            'success' => true,
            'message' => 'Data Program Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_program)
    {
        //
        $programs = Program::findOrFail($id_program);
        $programs->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
