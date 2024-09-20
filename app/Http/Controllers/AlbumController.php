<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Album;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str; // Tambahkan baris ini
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $albums = Album::latest()
        //         ->where('id_album', 'like', "%$search%")
        //         ->orWhere('jdl_album', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $albums = Album::orderBy('id_album', 'DESC')->paginate(10);
        // }

        $search = $request->search;
        $hari = $request->hari;

        $query = Album::query();

        if (!empty($search)) {
            $query->where('jdl_album', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($hari)) {
            $query->where('hari', $hari);
        }

        $albums = $query->paginate(10);

        $harian = Album::select('hari')
                    ->groupBy('hari')
                    ->get();

            $berita['total_berita'] = Berita::count();
            $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
            $agenda['total_agenda'] = Agenda::count();
            $users['total_users'] = User::count();

        return view('administrator.album.index', compact('berita', 'halamanbaru', 'agenda', 'users' ,'albums', 'harian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'gbr_album' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('gbr_album')) {
            $gambar = $request->file("gbr_album");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./img_album/", $gambarName);
        }

        Album::create([
            "jdl_album" => $judul,
            "keterangan" => $validated['keterangan'],
            "aktif" => $request->aktif ?? 'Y',
            "gbr_album" => $gambarName,
            "album_seo" => Str::slug($judul),
            "tgl_posting" => now(),
            "jam" => now()->format('H:i:s'),
            "hari" => now()->format('l'),
            "username" => 'admin',
        ]);

        return response()->json([
            'url' => route('administrator.album.index'),
            'success' => true,
            'message' => 'Data Album Berhasil Ditambah'
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
    public function edit(string $id_album):View
    {
        //
        $album = Album::where('id_album', $id_album)->firstOrFail();

        return view('administrator.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_album)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'gbr_album' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $album = Album::findOrFail($id_album); // Temukan record yang ingin diperbarui

        $judul = $request->judul;
        $gambarName = $album->gbr_album;

        if ($request->hasFile('gbr_album')) {
            $gambar = $request->file("gbr_album");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./img_album/", $gambarName);

            // Hapus gambar lama jika ada
            if ($album->gbr_album && file_exists("./img_album/" . $album->gbr_album)) {
                unlink("./img_album/" . $album->gbr_album);
            }
        }

        $album->update([
            "jdl_album" => $judul,
            "keterangan" => $validated['keterangan'],
            "gbr_album" => $gambarName,
            "aktif" => $request->aktif ?? 'Y',
        ]);

        return response()->json([
            'url' => route('administrator.album.index'),
            'success' => true,
            'message' => 'Data Album Berhasil Diperbarui'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_album)
    {
        //
        $album = Album::findOrFail($id_album);
        $album->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
