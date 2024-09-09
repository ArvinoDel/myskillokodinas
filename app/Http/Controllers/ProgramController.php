<?php

namespace App\Http\Controllers;

use App\Models\Kategoriprogram;
use App\Models\Kategoriprogramgroup;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $tanggal = $request->tanggal;

        $query = Program::query();

        if (!empty($search)) {
            $query->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $programs = $query->paginate(10);

        $tanggals = Program::select('tanggal')
                    ->groupBy('tanggal')
                    ->get();

        return view('administrator.program.index', compact(['programs', 'tanggals']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategoriprogram = Kategoriprogram::all();
        return view('administrator.program.create', compact(['kategoriprogram']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $nama_program = $request->nama_program;
        $harga = $request->harga;
        $keterangan = $request->keterangan;
        $judul = $request->judul;

        if ($request->nama_kategori !=''){
            $link = $request->nama_kategori;
            $nama_kategori=implode(',',$link);
        }else{
            $nama_kategori = '';
        }

        Program::create([
            "nama_program" => $nama_program,
            "nama_kategori" => $nama_kategori,
            "harga" => $harga,
            "keterangan" => $keterangan,
            "judul" => $judul,
            // "nama_kategori" => $nama_kategori,
            "tanggal" => now(),
            "id_program" => md5($nama_program.'-'.date('YmdHis')),
        ]);

        // Ganti penggunaan latest() atau orderBy('created_at') dengan orderBy('tanggal')
        $latestProgram = Program::orderBy('tanggal', 'desc')->first();

        if ($request->has('kategori_program')) {
            $kat = count($request->kategori_program);
            $kategori_program = $request->kategori_program;
            for($i = 0; $i < $kat; $i++){
                Kategoriprogramgroup::create([
                    'id_program' => $latestProgram->id_program,
                    'id_kategori' => $kategori_program[$i] // Pastikan id_kategori disertakan
                ]);
            }
        }

        // $kat = count($request->kategori_program);
        // $kategori_program = $request->kategori_program;
        // $sess = md5($nama_program.'-'.date('YmdHis'));
        // for($i = 0; $i < $kat; $i++){
        //     Kategoriprogramgroup::create([
        //         'id_program' =>$sess,
        //         'id_kategori' => $kategori_program[$i]
        //     ]);
        // }

        return response()->json([
            'url' => route('administrator.program.index'),
            'success' => true,
            'message' => 'Data Program Berhasil Ditambah'
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
    public function edit(string $id_pro):View
    {
        $programs = Program::where('id_pro', $id_pro)->firstOrFail();
        $kategoriprogram = Kategoriprogram::all(); // Tambahkan ini

        return view('administrator.program.edit', compact('programs', 'kategoriprogram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validated['password'] = bcrypt($validated['password']);

        //     // Jika password diisi, enkripsi password baru
        // if ($request->filled('password')) {
        //     $validated['password'] = bcrypt($request->password);
        // } else {
        //     // Jika password tidak diisi, gunakan password lama
        //     unset($validated['password']);
        // }

        $programs = Program::findOrFail($id);

        $nama_program = $request->nama_program;
        $judul = $request->judul;
        $harga = $request->harga;
        $keterangan = $request->keterangan;


        // if ($request->nama_modul !=''){
        //     $link = $request->nama_modul;
        //     $nama_modul=implode(',',$link);
        // }else{
        //     $nama_modul = '';
        // }


        $programs->update([
            "id_program" => $request->id_program,
            "nama_program" => $nama_program,
            "keterangan" => $keterangan,
            "harga" => $harga,
            "judul" => $judul,
            "tanggal" => now(),
        ]);

        // if (isset($validated['password'])) {
        //     $users->update(['password' => $validated['password']]);
        // }

        // Proses tambah akses baru
        // if ($request->has('nama_program')) {
        //     $existingPrograman = Kategoriprogramgroup::where('id_program', $programs->id_program)->pluck('id_kgroup')->toArray();
        //     $newPrograman = array_diff($request->nama_program, $existingPrograman);

        //     foreach ($newPrograman as $programId) {
        //         Kategoriprogramgroup::create([
        //             'id_program' => $programs->id_program,
        //             'id_kgroup' => $programId
        //         ]);
        //     }
        // }

        if ($request->has('kategori_program')) {
            $existingKategori = Kategoriprogramgroup::where('id_program', $programs->id_program)->pluck('id_kgroup')->toArray();
            $newKategori = array_diff($request->kategori_program, $existingKategori);

            foreach ($newKategori as $kategoriId) {
                Kategoriprogramgroup::create([
                    'id_program' => $programs->id_program,
                    'id_kategori' => $kategoriId // Pastikan id_kategori disertakan
                ]);
            }
        }

        return response()->json([
            'url' => route('administrator.program.index'),
            'success' => true,
            'message' => 'Data Program Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pro)
    {
        //
        $programs = Program::findOrFail($id_pro);
        $programs->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
