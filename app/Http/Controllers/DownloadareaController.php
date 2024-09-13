<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Downloadarea;
use App\Models\Halamanbaru;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $downloads = Downloadarea::latest()
        //         ->where('id_download', 'like', "%$search%")
        //         ->orWhere('judul', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $downloads = Downloadarea::orderBy('id_download', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $tgl_posting = $request->tgl_posting;

        $query = Downloadarea::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%")->orWhere('nama_file', 'like', "%$search%");
        }

        if (!empty($tgl_posting)) {
            $query->where('tgl_posting', $tgl_posting);
        }

        $downloads = $query->paginate(10);

        $tgl_postings = Downloadarea::select('tgl_posting')
                    ->groupBy('tgl_posting')
                    ->get();

            $berita['total_berita'] = Berita::count();
            $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
            $agenda['total_agenda'] = Agenda::count();
            $users['total_users'] = User::count();

        return view('administrator.downloadarea.index', compact('berita', 'halamanbaru', 'agenda', 'users', 'downloads', 'tgl_postings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.downloadarea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'nama_file' => 'required|file|mimes:pdf,doc,docx,xls,txt,xlsx,ppt,pptx,txt,png,jpg,jpeg,gif|max:10000'
        ]);

        $judul = $request->judul;
        $namaFile = null;

        if ($request->hasFile('nama_file')) {
            $file = $request->file("nama_file");
            $namaFile = $file->getClientOriginalName();
            $file->move("./downloads/", $namaFile);
        } else {
            return redirect()->route('administrator.downloadarea.index')->with(['error' => 'File harus dimasukan']);
        }

        Downloadarea::create([
            "judul" => $judul,
            "nama_file" => $namaFile,
            "tgl_posting" => now(),
            "hits" => 0
        ]);

        return response()->json([
            'url' => route('administrator.downloadarea.index'),
            'success' => true,
            'message' => 'Data Download Area Berhasil Ditambah'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id_download): mixed
    {
        //
        $download = Downloadarea::findOrFail($id_download);

        if ($request->has('download')) {
            $download->increment('hits');

            $filePath = public_path('downloads/' . $download->nama_file);

            if (file_exists($filePath)) {
                return response()->download($filePath, $download->nama_file);
            } else {
                session()->flash("pesan", "File tidak ditemukan");
                return redirect()->back()->with(['error' => 'File tidak ditemukan']);
            }
        }

        // Logika untuk menampilkan detail download jika tidak di-download
        return view('administrator.downloadarea.show', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_download)
    {
        //
        $download = Downloadarea::where('id_download', $id_download)->firstOrFail();
        return view('administrator.downloadarea.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_download)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,txt,xlsx,ppt,pptx,txt|max:2048'
        ]);

        $download = Downloadarea::findOrFail($id_download);

        $judul = $request->judul;

        if ($request->hasFile('nama_file')) {
            $file = $request->file("nama_file");
            $namaFile = $file->getClientOriginalName();
            $file->move("./downloads/", $namaFile);
            $download->nama_file = $namaFile;
        }

        $download->update([
            "judul" => $judul,
            "tgl_posting" => now(),
        ]);

        return response()->json([
            'url' => route('administrator.downloadarea.index'),
            'success' => true,
            'message' => 'Data Download Area Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_download)
    {
        //
        $download = Downloadarea::findOrFail($id_download);
        $download->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
