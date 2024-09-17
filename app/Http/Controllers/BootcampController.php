<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use Illuminate\Http\Request;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $judul_bootcamp = $request->judul_bootcamp;

        $query = Bootcamp::query();

        if (!empty($search)) {
            $query->where('judul_bootcamp', 'like', "%$search%")->orWhere('tanggal_mulai', 'like', "%$search%")->orWhere('tanggal_selesai', 'like', "%$search%");
        }

        if (!empty($judul_bootcamp)) {
            $query->where('judul_bootcamp', $judul_bootcamp);
        }

        $bootcamps = $query->paginate(10);
        

        $judul_bootcamps = Bootcamp::select('judul_bootcamp')
                    ->groupBy('judul_bootcamp')
                    ->get();

        return view('administrator.bootcamps.index', compact('bootcamps', 'judul_bootcamps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.bootcamps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul_bootcamp' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'harga' => 'required',
            'harga_diskon' => 'nullable',
            'sesi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deskripsi' => 'required'
        ]);

        $data = $request->all();
        $thumbnailName = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file("thumbnail");
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->move("./thumbnail_bootcamp/", $thumbnailName);
        }
        Bootcamp::create([
            "judul_bootcamp" => $data['judul_bootcamp'],
            "tanggal_mulai" => $data['tanggal_mulai'],
            "tanggal_selesai" => $data['tanggal_selesai'],
            "harga" => $data['harga'],
            "harga_diskon" => $data['harga_diskon'],
            "sesi" => $data['sesi'],
            "deskripsi" => $data['deskripsi'],
            "thumbnail" => $thumbnailName,
        ]);

        return response()->json([
            'url' => route('administrator.bootcamps.index'),
            'success' => true,
            'message' => 'Data Bootcamp Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $bootcamps = Bootcamp::findOrFail($id);
        return view('administrator.bootcamps.show', compact('bootcamp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_bootcamp)
    {
        //
        $bootcamps = Bootcamp::findOrFail($id_bootcamp);

        return view('administrator.bootcamps.edit', compact('bootcamps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'judul_bootcamp' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'harga' => 'required',
            'harga_diskon' => 'nullable',
            'sesi' => 'nullable|string',
            'deskripsi' => 'required'
        ]);

        $bootcamps = Bootcamp::findorfail($id);
        $bootcamps->judul_bootcamp = $validatedData['judul_bootcamp'];
        $bootcamps->tanggal_mulai = $validatedData['tanggal_mulai'];
        $bootcamps->tanggal_selesai = $validatedData['tanggal_selesai'];
        $bootcamps->harga = $validatedData['harga'];
        $bootcamps->harga_diskon = $validatedData['harga_diskon'];
        $bootcamps->sesi = $validatedData['sesi'];
        $bootcamps->deskripsi = $validatedData['deskripsi'];

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file("thumbnail");
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->move("./thumbnail_bootcamp/", $thumbnailName);
            $bootcamps->thumbnail = $thumbnailName;

            // Menghapus thumbnail lama jika ada
            if ($bootcamps->thumbnail) {
                $path = "./thumbnail_bootcamp/" . $bootcamps->thumbnail;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $bootcamps->save();
        dd($request);

        return response()->json([
            'url' => route('administrator.bootcamps.index'),
            'success' => true,
            'message' => 'Data Bootcamp Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bootcamps = Bootcamp::findOrFail($id);
        if ($bootcamps->thumbnail) {
            $path = "./thumbnail_bootcamp/" . $bootcamps->thumbnail;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $bootcamps->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
