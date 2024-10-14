<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\Tugasbootcamp;
use Illuminate\Http\Request;

class TugasbootcampController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $id_bootcamp = $request->id_bootcamp; // Tambahkan ini

        $query = Tugasbootcamp::query();

        if (!empty($search)) {
            $query->where('judul_tugas', 'like', "%$search%");
        }

        if (!empty($id_bootcamp)) { // Tambahkan ini
            $query->where('id_bootcamp', $id_bootcamp);
        }

        $tugasbootcamps = $query->with('bootcamp')->paginate(10); // Tambahkan relasi materi

        return view('administrator.tugasbootcamp.index', compact(['tugasbootcamps']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bootcamps = Bootcamp::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('administrator.tugasbootcamp.create', compact('bootcamps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'nullable|string|max:255', // Pastikan validasi string
            'judul_tugas' => 'required|string|max:255',
            'id_bootcamps' => 'nullable|exists:bootcamps,id_bootcamp',
            'deskripsi' => 'nullable|string', // Tambahkan validasi untuk deskripsi
            'file' => 'nullable|file|mimes:jpeg,jpg,png,gif,mp4,avi,mpeg,pdf,doc,docx,xls,xlsx,txt,zip', // Memperbolehkan berbagai jenis file
            'status' => 'required|boolean'
        ]);


        $videoName = null;

        if($request->hasFile('file')) {
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move(base_path('public_html/files_tugasbootcamps'), $videoName);
        }

        Tugasbootcamp::create([
            'url' => $request->url,
            'judul_tugas' => $request->judul_tugas,
            'deskripsi' => $request->deskripsi,
            'file' => $videoName,
            'id_bootcamp' => $request->id_bootcamp,
            'status' => $validated['status']
        ]);

        return response()->json([
            'url' => route('administrator.tugasbootcamp.index', ['id_bootcamp' => $request->id_bootcamp]),
            'success' => true,
            'message' => 'Data Tugas Berhasil Ditambah'
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
        $tugasbootcamps = Tugasbootcamp::findOrFail($id);

        $bootcamps = Bootcamp::all();

        return view('administrator.tugasbootcamp.edit', compact('tugasbootcamps', 'bootcamps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'url' => 'nullable|string|max:255',
            'id_bootcamp' => 'nullable|exists:bootcamps,id_bootcamp', // Validasi id_program
            'deskripsi' => 'nullable|string', // Tambahkan validasi untuk deskripsi
            'status' => 'required|boolean'
        ]);

        $tugasbootcamps = Tugasbootcamp::findOrFail($id);

        // Hapus video lama jika ada video baru yang diunggah
        if($request->hasFile('file')) {
            if ($tugasbootcamps->file && file_exists(public_path("files_tugasbootcamps/" . $tugasbootcamps->file))) {
                unlink(public_path("files_tugasbootcamps/" . $tugasbootcamps->file));
            }
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move(base_path('public_html/files_tugasbootcamps'), $videoName);
            $tugasbootcamps->file = $videoName;
        }

        $tugasbootcamps->update([
            'url' => $request->url,
            'judul_tugas' => $request->judul_tugas,
            'deskripsi' => $request->deskripsi,
            'file' => $tugasbootcamps->file,
            'id_materi' => $request->id_materi,
            'status' => $validated['status'],
        ]);

        return response()->json([
            'url' => route('administrator.tugasbootcamp.index', ['id_bootcamp' => $request->id_bootcamp]),
            'success' => true,
            'message' => 'Data Tugas Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugasbootcamps = Tugasbootcamp::findOrFail($id);
        $tugasbootcamps->delete();

       //Hapus file video dari storage
        if ($tugasbootcamps->file && file_exists(public_path("files_tugasbootcamps/" . $tugasbootcamps->file))) {
                unlink(public_path("files_tugasbootcamps/" . $tugasbootcamps->file));
        }

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
