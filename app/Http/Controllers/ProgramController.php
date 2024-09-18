<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Materi;
use App\Models\Program;
use App\Models\Trainer;
use App\Models\Testimoni;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Berlangganan;
use Illuminate\Http\Request;
use App\Models\Kategoriprogram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Kategoriprogramgroup;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
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
            $query->where('nama_program', 'like', "%$search%")
                ->orWhere('harga', 'like', "%$search%")
                ->orWhere('judul', 'like', "%$search%")
                ->orWhere('keterangan', 'like', "%$search%");
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
            $gambarName = $gambar->getClientOriginalName();
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
    public function show($id_kategori_program)
    {
        // Fetch the program based on the category ID
        $program = Program::where('id_kategori_program', $id_kategori_program)->firstOrFail();
        
        // Fetch additional data
        $trainer = Trainer::all();
        $testimonis = Testimoni::all();
        
        // Fetch only the specific category based on the given id_kategori_program
        $category = Kategoriprogram::where('id_kategori_program', $id_kategori_program)->firstOrFail();
        
        // Correct this line to make sure you're fetching the category and its associated materi
        $kategoriProgram = Kategoriprogram::with('materi')->find($id_kategori_program);
        
        $kategoriProgram = Kategoriprogram::with('materi')->findOrFail($id_kategori_program);
        
        // Assuming 'berlangganans' are for the specific program or category, you may want to filter them as well
        $berlangganans = Berlangganan::all();
        // $materis = Materi::where('id_kategori_program', $id_kategori_program)->get();
        $materis = Materi::join('topik', 'materi.id_topik', '=', 'topik.id_topik') // Join tabel topik
                ->where('materi.id_kategori_program', $id_kategori_program)
                ->orderBy('materi.id_topik', 'asc')
                ->get(['materi.*', 'topik.nama_topik']) // Mengambil semua data materi dan nama_topik
                ->groupBy('nama_topik') // Mengelompokkan berdasarkan nama_topik
                ->toArray();


        // dd($materis);

        // Decode JSON fields for 'berlangganans'
        foreach ($berlangganans as $berlangganan) {
            $berlangganan->id_benefits = json_decode($berlangganan->id_benefits);
        }

        // Pass the necessary variables to the view, including $kategoriProgram
        return view('myskill.pages.e-learning.program', compact('testimonis', 'berlangganans', 'trainer', 'category', 'materis', 'program', 'kategoriProgram'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_program): View
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
