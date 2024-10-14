<?php

namespace App\Http\Controllers;

use App\Models\Benefitbootcamp;
use App\Models\Bootcamp;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BootcamppengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $judul_bootcamp = $request->judul_bootcamp;

        if (Auth::user()->level == 'pengajar') {
            $id_pengajar = Auth::user()->id;
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $query = Bootcamp::with(['trainer']) // Eager load relasi
            ->whereHas('trainer', function ($q) use ($id_pengajar) {
                $q->where('id', $id_pengajar); // Filter berdasarkan id_pengajar
            });

        if (!empty($search)) {
            $query->where('judul_bootcamp', 'like', "%$search%");
        }

        if (!empty($judul_bootcamp)) {
            $query->where('judul_bootcamp', $judul_bootcamp);
        }

        $bootcamps = $query->paginate(10);

        $judul_bootcamps = Bootcamp::select('judul_bootcamp')
            ->whereHas('trainer', function ($q) use ($id_pengajar) {
                $q->where('id', $id_pengajar); // Filter untuk nama_materis
            })
            ->groupBy('judul_bootcamp')
            ->get();

        return view('pengajar.bootcamps.index', compact(['bootcamps', 'judul_bootcamps']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $benefits = Benefitbootcamp::all();
        $trainers = Trainer::all();
        return view('pengajar.bootcamps.create', compact('benefits', 'trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_bootcamp' => 'required|string|max:255',
            'harga' => 'required',
            'harga_diskon' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deskripsi' => 'required',
            'id_benefitcamps' => 'nullable|array',
            'id_trainer' => 'nullable|exists:trainer,id_trainer',
        ]);

        $data = $request->all();
        $data['id_benefitcamps'] = json_encode($request->input('id_benefitcamps'));
        $data['id_bootcamp'] = Str::uuid();


        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file("thumbnail");
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->move("./thumbnail_bootcamp/", $thumbnailName);
        }
        Bootcamp::create([
            "id_bootcamp" => $data['id_bootcamp'],
            "judul_bootcamp" => $data['judul_bootcamp'],
            "harga" => $data['harga'],
            "harga_diskon" => $data['harga_diskon'],
            "deskripsi" => $data['deskripsi'],
            "thumbnail" => $thumbnailName,
            "id_benefitcamps" => $data['id_benefitcamps'],
            'id_trainer' => $request->id_trainer,
        ]);

        return response()->json([
            'url' => route('pengajar.bootcamps.index'),
            'success' => true,
            'message' => 'Data Bootcamp Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bootcamp $bootcamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_bootcamp)
    {
        $bootcamps = Bootcamp::findOrFail($id_bootcamp);
        $bootcamps->id_benefitcamps = json_decode($bootcamps->id_benefitcamps) ?? []; // Decode JSON dan berikan array kosong jika null

        $benefits = Benefitbootcamp::all();
        $trainers = Trainer::all();

        return view('pengajar.bootcamps.edit', compact('bootcamps', 'benefits', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'judul_bootcamp' => 'required|string|max:255',
            'harga' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'harga_diskon' => 'nullable',
            'deskripsi' => 'required',
            'id_benefitcamps' => 'nullable|array',
            'id_trainer' => 'nullable|exists:trainer,id_trainer',
        ]);

        $bootcamps = Bootcamp::findorfail($id);
        $bootcamps->judul_bootcamp = $validatedData['judul_bootcamp'];
        $bootcamps->harga = $validatedData['harga'];
        $bootcamps->harga_diskon = $validatedData['harga_diskon'];
        $bootcamps->deskripsi = $validatedData['deskripsi'];
        $bootcamps->id_benefitcamps = json_encode($request->input('id_benefitcamps'));
        $bootcamps->id_trainer = $request->id_trainer;
        if ($request->hasFile('thumbnail')) {

            if ($bootcamps->thumbnail) {
                $path = "./thumbnail_bootcamp/" . $bootcamps->thumbnail;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $thumbnail = $request->file("thumbnail");
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->move("./thumbnail_bootcamp/", $thumbnailName);

            $bootcamps->thumbnail = $thumbnailName;
        }

        $bootcamps->save();
        // dd($request);

        return response()->json([
            'url' => route('pengajar.bootcamps.index'),
            'success' => true,
            'message' => 'Data Bootcamp Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
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
