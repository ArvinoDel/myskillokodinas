<?php

namespace App\Http\Controllers;

use App\Models\Iklanatas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;

class IklanatasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $iklanatas = Iklanatas::latest()
        //         ->orWhere('judul', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $iklanatas = Iklanatas::orderBy('id_iklanatas', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $tgl_posting = $request->tgl_posting;

        $query = Iklanatas::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%")->orWhere('tgl_posting', 'like', "%$search%");
        }
  
        if (!empty($tgl_posting)) {
            $query->where('tgl_posting', $tgl_posting);
        }

        $iklanatas = $query->paginate(10);

        $tgl_postings = Iklanatas::select('tgl_posting')
                    ->groupBy('tgl_posting')
                    ->get();

        return view('administrator.iklanatas.index', compact(['iklanatas', 'tgl_postings']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.iklanatas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required'
        ]);

        $judul = $request->judul;
        $gambarName = null;
        $username = $request->username ?: 'admin';

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_iklansidebar/", $gambarName);
        }

        Iklanatas::create([
            'judul' => $validated['judul'],
            'gambar' => $gambarName,
            'url' => $validated['url'],
            'tgl_posting' => now(),
            'username' => $username
        ]);

        return response()->json([
            'url' => route('administrator.iklanatas.index'),
            'success' => true,
            'message' => 'Data Iklan Atas Berhasil Ditambah'
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
    public function edit(string $id_iklanatas):View
    {
        //
        $iklanatas = Iklanatas::findOrFail($id_iklanatas);
        return view('administrator.iklanatas.edit', compact('iklanatas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_iklanatas)
    {
        //
        $iklanatas = Iklanatas::findOrFail($id_iklanatas);

        $judul = $request->judul;
        $url = $request->url;

        $updateData = [
            'judul' => $judul,
            'url' => $url
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_iklanatas/", $gambarName);
            $updateData['gambar'] = $gambarName;

            // Hapus gambar lama jika ada
            if ($iklanatas->gambar) {
                $path = "./foto_iklanatas/" . $iklanatas->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $iklanatas->update($updateData);

        return response()->json([
            'url' => route('administrator.iklanatas.index'),
            'success' => true,
            'message' => 'Data Iklan Atas Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_iklanatas)
    {
        //
        $iklanatas = Iklanatas::findOrFail($id_iklanatas);
        $iklanatas->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
