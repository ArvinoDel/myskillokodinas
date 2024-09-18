<?php

namespace App\Http\Controllers;

use App\Models\Bannerslider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class BannersliderController extends Controller
{
    /**
     * Menampilkan daftar banner slider.
     */
    public function index(Request $request): View
    {
        $search = $request->search;
        $judul = $request->judul;

        $query = Bannerslider::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $bannersliders = $query->paginate(10);

        $juduls = Bannerslider::select('judul')
                    ->groupBy('judul')
                    ->get();

        return view('administrator.bannerslider.index', compact('bannersliders', 'juduls'));
    }

    /**
     * Menampilkan form untuk membuat banner slider baru.
     */
    public function create(): View
    {
        return view('administrator.bannerslider.create');
    }

    /**
     * Menyimpan banner slider baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required',
            'is_myskill' => 'nullable|boolean'
        ]);

        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambar->move("./foto_banner/", $gambarName);
        }

        Bannerslider::create([
            'judul' => $validated['judul'],
            'gambar' => $gambarName,
            'tgl_posting' => now(),
            'deskripsi' => $request->deskripsi,
            'is_myskill' => $validated['is_myskill']
        ]);

        return response()->json([
            'url' => route('administrator.bannerslider.index'),
            'success' => true,
            'message' => 'Data Banner Slider Berhasil Ditambah'
        ]);
    }

    /**
     * Menampilkan banner slider tertentu.
     */
    public function show(string $id): View
    {
        $bannerslider = Bannerslider::findOrFail($id);
        return view('administrator.bannerslider.show', compact('bannerslider'));
    }

    /**
     * Menampilkan form untuk mengedit banner slider.
     */
    public function edit(string $id): View
    {
        $bannerslider = Bannerslider::findOrFail($id);
        return view('administrator.bannerslider.edit', compact('bannerslider'));
    }

    /**
     * Memperbarui banner slider tertentu dalam penyimpanan.
     */
    public function update(Request $request, string $id)
    {
        // $validated = $request->validate([
        //     'judul' => 'required|string|max:255',
        //     'deskripsi' => 'required|string'
        // ]);

        $bannerslider = Bannerslider::findOrFail($id);

        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $myskill = $request->is_myskill;

        $updateData = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'is_myskill' => $myskill,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_banner/", $gambarName);
            $updateData['gambar'] = $gambarName;

            // Menghapus gambar lama jika ada
            if ($bannerslider->gambar) {
                $path = "./foto_banner/" . $bannerslider->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $bannerslider->update($updateData);

        return response()->json([
            'url' => route('administrator.bannerslider.index'),
            'success' => true,
            'message' => 'Data Banner Slider Berhasil Diperbarui'
        ]);
    }

    /**
     * Menghapus banner slider tertentu dari penyimpanan.
     */
    public function destroy(string $id)
    {
        $bannerslider = Bannerslider::findOrFail($id);
        $bannerslider->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
