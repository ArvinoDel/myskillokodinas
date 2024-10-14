<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\Materibootcamp;
use Illuminate\Http\Request;

class MateripengajarbootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $id_bootcamp = $request->id_bootcamp; // Tambahkan ini

        $query = Materibootcamp::query();

        if (!empty($search)) {
            $query->where('judul_file', 'like', "%$search%")->orWhere('url', 'like', "%$search%");
        }

        if (!empty($id_bootcamp)) { // Tambahkan ini
            $query->where('id_bootcamp', $id_bootcamp);
        }

        $materibootcamps = $query->with('bootcamp')->paginate(10); // Tambahkan relasi materi

        return view('pengajar.materibootcamp.index', compact(['materibootcamps']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bootcamps = Bootcamp::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('pengajar.materibootcamp.create', compact('bootcamps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'nullable|string|max:255', // Pastikan validasi string
            'judul_file' => 'required|string|max:255',
            'file' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,application/pdf|max:20480',
            'id_bootcamp' => 'required|exists:bootcamps,id_bootcamp',
        ]);

        // $data['id_bootcamp'] = Str::uuid();
        $videoName = null;

        if($request->hasFile('file')) {
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move("./files_bootcamps/", $videoName);
        }

        Materibootcamp::create([
            'url' => $request->url,
            'judul_file' => $request->judul_file,
            'file' => $videoName,
            'id_bootcamp' => $request->id_bootcamp,
        ]);

        return response()->json([
            'url' => route('pengajar.materibootcamp.index', ['id_bootcamp' => $request->id_bootcamp]),
            'success' => true,
            'message' => 'Data Materi Bootcamp Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Materibootcamp $materibootcamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materibootcamps = Materibootcamp::findOrFail($id);

        $bootcamps = Bootcamp::all();

        return view('pengajar.materibootcamp.edit', compact('materibootcamps', 'bootcamps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'url' => 'required|string|max:255',
            'id_bootcamp' => 'nullable|exists:bootcamps,id_bootcamp', // Validasi id_program
        ]);

        $materibootcamps = Materibootcamp::findOrFail($id);

        // Hapus video lama jika ada video baru yang diunggah
        if($request->hasFile('file')) {
            if ($materibootcamps->file && file_exists(public_path("files_bootcamps/" . $materibootcamps->file))) {
                unlink(public_path("files_bootcamps/" . $materibootcamps->file));
            }
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move(public_path("file"), $videoName);
            $materibootcamps->file = $videoName;
        }

        $materibootcamps->update([
            'url' => $request->url,
            'judul_file' => $request->judul_file,
            'file' => $materibootcamps->file,
            'id_bootcamp' => $request->id_bootcamp,
        ]);

        return response()->json([
            'url' => route('pengajar.materibootcamp.index', ['id_bootcamp' => $request->id_bootcamp]),
            'success' => true,
            'message' => 'Data Materi Bootcamp Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materibootcamps = Materibootcamp::findOrFail($id);
        $materibootcamps->delete();

       //Hapus file video dari storage
        if ($materibootcamps->file && file_exists(public_path("files/" . $materibootcamps->file))) {
            unlink(public_path("files/" . $materibootcamps->file));
        }

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
