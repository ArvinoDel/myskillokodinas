<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Sekilasinfo;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SekilasinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $infos = Sekilasinfo::latest()
        //         ->where('id_sekilas', 'like', "%$search%")
        //         ->orWhere('info', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $infos = Sekilasinfo::orderBy('id_sekilas', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $info = $request->info;

        $query = Sekilasinfo::query();

        if (!empty($search)) {
            $query->where('info', 'like', "%$search%");
        }

        if (!empty($info)) {
            $query->where('info', $info);
        }

        $infos = $query->paginate(10);

        $informas = Sekilasinfo::select('info')
                    ->groupBy('info')
                    ->get();

            $berita['total_berita'] = Berita::count();
            $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
            $agenda['total_agenda'] = Agenda::count();
            $users['total_users'] = User::count();

        return view('administrator.sekilasinfo.index', compact('berita', 'halamanbaru', 'agenda', 'users', 'informas', 'infos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.sekilasinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'info' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $info = $request->info;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_info/", $gambarName);
        }

        Sekilasinfo::create([
            "info" => $info,
            "aktif" => $request->aktif ?? 'Y',
            "tgl_posting" => now(),
            "gambar" => $gambarName
        ]);  

        return response()->json([
            'url' => route('administrator.sekilasinfo.index'),
            'success' => true,
            'message' => 'Data Sekilasinfo Berhasil Ditambah'
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
    public function edit(Request $request, string $id_sekilas):View
    {
        //
        $infot = Sekilasinfo::where('id_sekilas', $id_sekilas)->firstOrFail();
        return view('administrator.sekilasinfo.edit', compact('infot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_sekilas)
    {
        //
        $validated = $request->validate([
            'info' => 'required|string',
            'aktif' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $sekilasinfo = Sekilasinfo::findOrFail($id_sekilas);

        $info = $request->info;

        // Menghapus gambar lama jika ada
        if ($sekilasinfo->gambar && file_exists("./foto_info/" . $sekilasinfo->gambar)) {
            unlink("./foto_info/" . $sekilasinfo->gambar);
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_info/", $gambarName);
            $sekilasinfo->gambar = $gambarName;
        }

        $sekilasinfo->update([
            "info" => $info,
            "aktif" => $request->aktif ?? 'Y',
            "tgl_posting" => now()
        ]);

        return response()->json([
            'url' => route('administrator.sekilasinfo.index'),
            'success' => true,
            'message' => 'Data Sekilasinfo Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_sekilas)
{
    $info = Sekilasinfo::findOrFail($id_sekilas);

    // // Hapus gambar terkait jika ada
    if ($info->gambar && file_exists("./foto_info/" . $info->gambar)) {
        unlink("./foto_info/" . $info->gambar);
    }

    $info->delete();

    // Pastikan Anda mengembalika response JSON
    return response()->json(['message' => 'Data berhasil dihapus.']);
}

}
