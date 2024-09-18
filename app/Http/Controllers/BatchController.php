<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Bootcamp;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $nama_sesi = $request->nama_sesi;

        $query = Batch::query();

        if (!empty($search)) {
            $query->where('nama_sesi', 'like', "%$search%");
        }

        if (!empty($nama_sesi)) {
            $query->where('nama_sesi', $nama_sesi);
        }

        $batchs = $query->paginate(10);


        $nama_sesis = Batch::select('nama_sesi')
            ->groupBy('nama_sesi')
            ->get();

        // dd($bootcamp);

        return view('administrator.batch.index', compact('batchs', 'nama_sesis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $bootcamps = Bootcamp::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('administrator.batch.create', compact('bootcamps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_sesi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'id_bootcamp' => 'nullable|exists:bootcamps,id_bootcamp',
        ]);

        Batch::create([
            'nama_sesi' => $request->nama_sesi,
            'tanggal_mulai' => $request->tanggal_mulai, // Simpan dalam format YYYY-MM-DD
            'tanggal_selesai' => $request->tanggal_selesai, // Simpan dalam format YYYY-MM-DD
            'id_bootcamp' => $request->id_bootcamp,
        ]);

        return response()->json([
            'url' => route('administrator.bootcamps.index'),
            'success' => true,
            'message' => 'Data Batch Berhasil Ditambah'
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
        $batchs = Batch::findOrFail($id);

        $bootcamps = Bootcamp::all();

        return view('administrator.batch.edit', compact('batchs', 'bootcamps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_batch)
    {
        //
        $validated = $request->validate([
            'nama_sesi' => 'required|string|max:255',
            'id_bootcamp' => 'nullable|exists:bootcamps,id_bootcamp', // Validasi id_program
        ]);

        $batchs = Batch::findOrFail($id_batch);

        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        $batchs->update([
            "nama_sesi" => $validated['nama_sesi'],
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_selesai" => $tanggal_selesai,
        ]);

        return response()->json([
            'url' => route('administrator.bootcamps.index'),
            'success' => true,
            'message' => 'Data Batch Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $batchs = Batch::findOrFail($id);
        $batchs->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
