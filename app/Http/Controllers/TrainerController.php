<?php

namespace App\Http\Controllers;

use App\Models\Kategoriprogram;
use App\Models\Program;
use App\Models\Trainer;
use App\Models\Trainerprogramgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $nama_trainer = $request->nama_trainer;

        $query = Trainer::query();

        if (!empty($search)) {
            $query->where('nama_trainer', 'like', "%$search%");
        }

        if (!empty($nama_trainer)) {
            $query->where('nama_trainer', $nama_trainer);
        }

        $trainers = $query->paginate(10);

        $nama_trainers = Trainer::select('nama_trainer')
                    ->groupBy('nama_trainer')
                    ->get();

        return view('administrator.trainer.index', compact(['trainers', 'nama_trainers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $programs = Program::all();
        $kategoriprogram = Kategoriprogram::all();
        return view('administrator.trainer.create', compact('programs', 'kategoriprogram'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $nama_trainer = $request->nama_trainer;

        // if ($request->nama_trainer != '') {
        //     $link = $request->nama_kategori;
        //     if (is_array($link)) {
        //         $nama_trainer = implode(',', $link);
        //     } else {
        //         $nama_trainer = $link; // Atau berikan nilai default jika bukan array
        //     }
        // } else {
        //     $nama_trainer = '';
        // }

        $gambarName = null;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambar->move("./foto_trainer/", $gambarName);
        }

        Trainer::create([
            'nama_trainer' => $nama_trainer,
            'foto' => $gambarName,
            "tanggal" => now(),
            "id_trainer" => md5($nama_trainer.'-'.date('YmdHis')),
        ]);

        $pro = count($request->program);
        $program = $request->program;
        $sess = md5($nama_trainer.'-'.date('YmdHis'));
        for($i = 0; $i < $pro; $i++){
            Trainerprogramgroup::create([
                'id_trainer' =>$sess,
                'id_kategori' => $program[$i]
            ]);
        }

        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Ditambah'
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
    public function edit(string $id)
    {
        //
        $trainers = Trainer::findOrFail($id);
        $akses = DB::table('trainer')
        ->join('trainer_program_group', 'trainer.id_trainer', '=', 'trainer_program_group.id_trainer')
        ->join('program', 'trainer_program_group.id_kategori', '=', 'program.id_pro') // Perbaiki kolom yang di-join
        ->where('trainer.id_tra', $id) // Perbaiki nama kolom
        ->orderBy('trainer_program_group.id_tgroup', 'DESC')
        ->get();

        $kategoriprograms = Kategoriprogram::all();
        $programs = Program::all();

        $akses_program = $akses->pluck('id_program')->toArray();

        return view('administrator.trainer.edit', compact('trainers', 'kategoriprograms', 'programs', 'akses_program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $trainers = Trainer::findOrFail($id);

        $nama_trainer = $request->nama_trainer;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_trainer/", $gambarName);
            $updateData['gambar'] = $gambarName;
        }

        if ($request->nama_program !=''){
            $link = $request->nama_program;
            $nama_program=implode(',',$link);
        }else{
            $nama_program = '';
        }

        $trainers->update([
            "nama_trainer" => $nama_trainer,
            "tanggal" => now(),
        ]);

        if ($request->has('program')) {
            // Hapus program lama
            Trainerprogramgroup::where('id_trainer', $trainers->id_trainer)->delete();

            // Tambahkan program baru
            foreach ($request->program as $programId) {
                Trainerprogramgroup::create([
                    'id_trainer' => $trainers->id_trainer,
                    'id_kategori' => $programId
                ]);
            }
        }

        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tra)
    {
        //
        $trainers = Trainer::findOrFail($id_tra);
        $trainers->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
