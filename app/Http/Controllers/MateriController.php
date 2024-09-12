<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Program;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;



use Illuminate\Support\Facades\Log; // Tambahkan ini untuk mengatasi undefined type Log

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


        // Ambil semua data program
        $programs = Program::all();

        $judul_materis = Materi::select('judul_materi')
            ->groupBy('judul_materi')
            ->get();

        return view('administrator.materi.index', compact(['materis', 'judul_materis', 'programs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('administrator.materi.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    Log::info('Request Data:', $request->all());

    $request->validate([
        'judul_materi' => 'required|string|max:255',
        'id_program' => 'nullable|exists:program,id_program',
        'video_materi' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg|max:20480',
    ]);

    $videoName = null;

    if($request->hasFile('video_materi')) {
        $video = $request->file("video_materi");
        $videoName = $video->getClientOriginalName();
        $video->move("./video_materi/", $videoName);
    }

    try {
        Materi::create([
            'judul_materi' => $request->judul_materi,
            'id_program' => $request->id_program,
            "video_materi" => $videoName,
        ]);

        return response()->json([
            'url' => route('administrator.materi.index'),
            'success' => true,
            'message' => 'Data Materi Berhasil Ditambah'
        ]);
    } catch (\Exception $e) {
        Log::error('Error:', ['exception' => $e->getMessage()]);
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menambah data.'
        ], 500);
    }
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

        $programs = Program::all();
        return view('administrator.materi.edit', compact('materis', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'judul_materi' => 'required|string|max:255',
            'id_program' => 'nullable|exists:program,id_program', // Validasi id_program
            'video_materi' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:20480',
        ]);

        // Temukan materi yang akan diperbarui
        $materis = Materi::findOrFail($id);


         // Hapus video lama jika ada video baru yang diunggah
        if($request->hasFile('video_materi')) {
            if ($materis->video_materi && file_exists(public_path("video_materi/" . $materis->video_materi))) {
                unlink(public_path("video_materi/" . $materis->video_materi));
            }
            $video = $request->file("video_materi");
            $videoName = $video->getClientOriginalName();
            $video->move(public_path("video_materi"), $videoName);
            $materis->video_materi = $videoName;
        }

        // Perbarui data materi
        $materis->update([
            'judul_materi' => $request->judul_materi,
            'id_program' => $request->id_program,
            'video_materi' => $materis->video_materi,
        ]);

        return response()->json([
            'url' => route('administrator.materi.index'),
            'success' => true,
            'message' => 'Data Materi Berhasil Diperbarui'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materis = Materi::findOrFail($id);
        $materis->delete();

       // Hapus file video dari storage
        if ($materis->video_materi && file_exists(public_path("video_materi/" . $materis->video_materi))) {
            unlink(public_path("video_materi/" . $materis->video_materi));
        }

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
