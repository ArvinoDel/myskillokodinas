<?php

namespace App\Http\Controllers;

use App\Models\Iklansidebar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class IklansidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        $judul = $request->judul;

        $query = Iklansidebar::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $iklansidebar = $query->paginate(10);

        $juduls = Iklansidebar::select('judul')
                    ->groupBy('judul')
                    ->get();

        return view('administrator.iklansidebar.index', compact(['iklansidebar', 'juduls']));
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.iklansidebar.create');
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

        Iklansidebar::create([
            'judul' => $validated['judul'],
            'gambar' => $gambarName,
            'url' => $validated['url'],
            'tgl_posting' => now(),
            'username' => $username
        ]);

        return response()->json([
            'url' => route('administrator.iklansidebar.index'),
            'success' => true,
            'message' => 'Data Iklan Sidebar Berhasil Ditambah'
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
    public function edit(string $id):View
    {
        //
        $iklansidebar = Iklansidebar::findOrFail($id);
        return view('administrator.iklansidebar.edit', compact('iklansidebar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $iklansidebar = Iklansidebar::findOrFail($id);

        $judul = $request->judul;
        $url = $request->url;

        $updateData = [
            'judul' => $judul,
            'url' => $url
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_iklansidebar/", $gambarName);
            $updateData['gambar'] = $gambarName;

            // Hapus gambar lama jika ada
            if ($iklansidebar->gambar) {
                $path = "./foto_iklansidebar/" . $iklansidebar->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $iklansidebar->update($updateData);

        return response()->json([
            'url' => route('administrator.iklansidebar.index'),
            'success' => true,
            'message' => 'Data Iklan Sidebar Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $iklansidebar = Iklansidebar::findOrFail($id);
        $iklansidebar->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
