<?php

namespace App\Http\Controllers;

use App\Models\Bannerhome;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class BannerhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    { 
        //  
        // $search = $request->search;
        // if(!empty($search)) {
        //     $bannerhomes = Bannerhome::latest()
        //     ->where('judul', 'like', "%$search%")
        //     ->paginate(10);
        // } else {
        //     $bannerhomes = Bannerhome::orderBy('id_iklantengah', 'desc')->orderBy('tgl_posting')->paginate(10);
        // }

        $search = $request->search;
        $judul = $request->judul;

        $query = Bannerhome::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $bannerhomes = $query->paginate(10);

        $juduls = Bannerhome::select('judul')
                    ->groupBy('judul')
                    ->get();

        return view('administrator.bannerhome.index', compact(['bannerhomes', 'juduls']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.bannerhome.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $judul = $request->judul;
        $url = $request->url;
        $tgl_posting = now(); // Menggunakan waktu saat ini
        $username = $request->username ?: 'admin';

        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_bannerhome/", $gambarName);
        }

        Bannerhome::create([
            "judul" => $judul,
            "url" => $url,
            "tgl_posting" => $tgl_posting,
            "gambar" => $gambarName,
            "username" => $username
        ]);

        return response()->json([
            'url' => route('administrator.bannerhome.index'),
            'success' => true,
            'message' => 'Data Banner Home Berhasil Ditambah'
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
        $bannerhomes = Bannerhome::findOrFail($id);
        return view('administrator.bannerhome.edit', compact('bannerhomes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $bannerhomes = Bannerhome::findOrFail($id);

        $judul = $request->judul;
        $url = $request->url;
        $tgl_posting = now(); // Menggunakan waktu saat ini
        $username = $request->username ?: 'admin';

        $updateData = [
            'judul' => $judul,
            'url' => $url,
            'tgl_posting' => $tgl_posting,
            'username' => $username
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_bannerhome/", $gambarName);
            $updateData['gambar'] = $gambarName;

            // Menghapus gambar lama jika ada
            if ($bannerhomes->gambar) {
                $path = "./foto_bannerhome/" . $bannerhomes->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $bannerhomes->update($updateData);

        return response()->json([
            'url' => route('administrator.bannerhome.index'),
            'success' => true,
            'message' => 'Data Banner Home Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $bannerhomes = Bannerhome::findOrFail($id);

        $bannerhomes->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
