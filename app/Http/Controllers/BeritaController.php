<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Berita;
use App\Models\Tag;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        $search = $request->search;
        $month = $request->month;

        $query = Berita::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%")
                ->orWhere('isi_berita', 'like', "%$search%");
        }

        if (!empty($month)) {
            $query->whereMonth('tanggal', $month);
        }

        $berita = $query->orderBy('tanggal', 'desc')->paginate(10);

        $months = Berita::selectRaw('MONTH(tanggal) as month')
                    ->groupBy('month')
                    ->get();

        return view('administrator.berita.index', compact('berita', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        $kategori = Kategori::all();

        $tags = Tag::all();
        return view('administrator.berita.create', compact(['kategori', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_kategori' => 'required|exists:kategori,id_kategori', // Tambahkan validasi untuk kategori
            'isi_berita' => 'required', // Tambahkan validasi untuk isi berita
        ]);

        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName =$gambar->getClientOriginalName();
            $gambar->move("./foto_berita/", $gambarName);
        }
        $keterangan_gambar = $request->keterangan_gambar;

        $username = $request->username ?: 'admin';

        if ($request->tag !=''){
            $tag_seo = $request->tag;
            $tag=implode(',',$tag_seo);
        }else{
            $tag = '';
        }

        Berita::create([
            "judul" => $judul,
            "sub_judul" => $request->sub_judul,
            "youtube" => $request->youtube,
            "judul_seo" => Str::slug($validated['judul']),
            "headline" => $request->headline ?? 0,
            "aktif" => $request->aktif ?? 'Y',
            "utama" => $request->utama ?? 0,
            "id_kategori" => $validated['id_kategori'],
            "isi_berita" => $request->isi_berita,
            "tanggal" => now(),
            "tag" => $tag,
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username,
            "gambar" => $gambarName,
            "keterangan_gambar" => $keterangan_gambar
        ]);



        // if ($request->has('tags')) {
        //     $berita->tags()->attach($request->tag);
        // }

        return response()->json([
            'url' => route('administrator.berita.index'),
            'success' => true,
            'message' => 'Data Berita Berhasil Ditambah'
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
    public function edit(string $id_berita):View
    {
        $kategori = Kategori::all();
        $tags = Tag::all();

        $berita = Berita::where('id_berita', $id_berita)->firstOrFail();

        return view('administrator.berita.edit', compact('berita', 'kategori', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_berita)
    {
        //
        // dd($request);
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'nullable|string|max:255',
            'youtube' => 'nullable|url|max:255',
            'headline' => 'required|in:Y,N',
            'aktif' => 'required|in:Y,N',
            'utama' => 'required|in:Y,N',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'isi_berita' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $berita = Berita::findOrFail($id_berita);

        $judul = $request->judul;
        $username = $request->username ?: 'admin';

        if ($request->tag !=''){
            $tag_seo = $request->tag;
            $tag=implode(',',$tag_seo);
        }else{
            $tag = '';
        }

        // Hapus gambar lama jika ada
        if ($berita->gambar && file_exists("./foto_berita/" . $berita->gambar)) {
            unlink("./foto_berita/" . $berita->gambar);
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_berita/", $gambarName);
            $berita->gambar = $gambarName;
        }

        $berita->update([
            "judul" => $judul,
            "sub_judul" => $request->sub_judul,
            "youtube" => $request->youtube,
            "judul_seo" => Str::slug($validated['judul']),
            "headline" => $validated['headline'],
            "aktif" => $validated['aktif'],
            "utama" => $validated['utama'],
            "id_kategori" => $request->id_kategori,
            "isi_berita" => $request->isi_berita,
            "tag" => $tag,
            "tgl_posting" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username
        ]);

        return response()->json([
            'url' => route('administrator.berita.index'),
            'success' => true,
            'message' => 'Data Berita Berhasil Diperbaharui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_berita)
    {
        //
        $berita = Berita::findOrFail($id_berita);
        $berita->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function publish(string $id_berita): RedirectResponse
    {
        // Ambil berita berdasarkan ID
        $berita = Berita::findOrFail($id_berita);

        // Periksa status saat ini dan toggle status
        $status = ($berita->status === 'Y') ? 'N' : 'Y';

        // Update status
        $berita->update(['status' => $status]);

        // Redirect kembali ke halaman list berita
        return redirect()->route('administrator.berita.index')->with(['success' => 'Status berita berhasil diubah.']);
    }

}
