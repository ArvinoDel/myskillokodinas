<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulantugas;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;

class PengumpulantugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $email = $request->email; // Ubah dari judul_tugas ke nama_lengkap
        $id_tugas = $request->id_tugas;

        $query = Pengumpulantugas::query();

        if (!empty($search)) {
            $query->where('deskripsi', 'like', "%$search%");
        }

        if (!empty($emails)) {
            $query->whereHas('user', function ($q) use ($email) {
                $q->where('email', $email); // Filter berdasarkan nama lengkap user
            });
        }

        if (!empty($id_tugas)) {
            $query->where('id_tugas', $id_tugas);
        }

        $emails = User::select('email')
            ->groupBy('email')
            ->get(); // Mendapatkan daftar nama_lengkap dari user

        $pengumpulantugass = $query->with(['tugas', 'user'])->paginate(10);

        return view('pengajar.pengumpulantugas.index', compact(['pengumpulantugass', 'emails']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id_pengumpulan)
    {
        $pengumpulantugass = Pengumpulantugas::findOrFail($id_pengumpulan);

        $manajemenusers = User::all();
        $tugass = Tugas::all();

        return view('pengajar.pengumpulantugas.edit', compact('pengumpulantugass', 'tugass', 'manajemenusers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nilai' => 'required|numeric|integer',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file',
        ]);

        $pengumpulantugas = Pengumpulantugas::findOrFail($id);

        // Hapus file lama jika ada file baru yang diunggah
        if($request->hasFile('file')) {
            if ($pengumpulantugas->file && file_exists(public_path("files_pengumpulantugas/" . $pengumpulantugas->file))) {
                unlink(public_path("files_pengumpulantugas/" . $pengumpulantugas->file));
            }
            $file = $request->file("file");
            $fileName = $file->getClientOriginalName();
            $file->move(public_path("files_pengumpulantugas"), $fileName);
            $pengumpulantugas->file = $fileName;
        }

        $pengumpulantugas->update([
            'nilai' => $validated['nilai'],
            'deskripsi' => $validated['deskripsi'],
            'file' => $pengumpulantugas->file,
        ]);

        return response()->json([
            'url' => route('pengajar.pengumpulantugas.index'),
            'success' => true,
            'message' => 'Data Pengumpulan Berhasil Di Nilai'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pengumpulan)
    {
        //
        $pengumpulantugas = Pengumpulantugas::findOrFail($id_pengumpulan);
        if ($pengumpulantugas->file) {
            $path = "./files_pengumpulantugas/" . $pengumpulantugas->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $pengumpulantugas->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
