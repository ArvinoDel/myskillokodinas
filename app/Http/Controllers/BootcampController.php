<?php

namespace App\Http\Controllers;

use App\Models\Benefitbootcamp;
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
            $query->where('judul_bootcamp', 'like', "%$search%");
        }

        if (!empty($judul_bootcamp)) {
            $query->where('judul_bootcamp', $judul_bootcamp);
        }

        $bootcamps = $query->paginate(10);


        $judul_bootcamps = Bootcamp::select('judul_bootcamp')
            ->groupBy('judul_bootcamp')
            ->get();

        foreach ($bootcamps as $bootcamp) {
            $bootcamp->id_benefitcamps = json_decode($bootcamp->id_benefitcamps) ?? []; // Decode JSON dan berikan array kosong jika null
        }

        // dd($bootcamp);

        return view('administrator.bootcamps.index', compact('bootcamps', 'judul_bootcamps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $benefits = Benefitbootcamp::all();
        return view('administrator.bootcamps.create', compact('benefits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul_bootcamp' => 'required|string|max:255',
            'harga' => 'required',
            'harga_diskon' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deskripsi' => 'required',
            'id_benefitcamps' => 'nullable|array'
        ]);

        $data = $request->all();
        $data['id_benefitcamps'] = json_encode($request->input('id_benefitcamps'));


        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file("thumbnail");
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->move("./thumbnail_bootcamp/", $thumbnailName);
        }
        Bootcamp::create([
            "judul_bootcamp" => $data['judul_bootcamp'],
            "harga" => $data['harga'],
            "harga_diskon" => $data['harga_diskon'],
            "deskripsi" => $data['deskripsi'],
            "thumbnail" => $thumbnailName,
            "id_benefitcamps" => $data['id_benefitcamps'],
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
    public function show(string $id_bootcamp)
    {
        // Fetch a single bootcamp by its ID
        $bootcamp = Bootcamp::findOrFail($id_bootcamp);

        // Decode JSON for `id_benefitcamps` if it's not null, otherwise return an empty array
        $bootcamp->id_benefitcamps = json_decode($bootcamp->id_benefitcamps) ?? [];

        // Pass the single bootcamp to the view
        return view('myskill.pages.program.digital-marketing', compact('bootcamp'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_bootcamp)
    {
        //
        $bootcamps = Bootcamp::findOrFail($id_bootcamp);
        $bootcamps->id_benefitcamps = json_decode($bootcamps->id_benefitcamps) ?? []; // Decode JSON dan berikan array kosong jika null

        $benefits = Benefitbootcamp::all();

        return view('administrator.bootcamps.edit', compact('bootcamps', 'benefits'));
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
            'id_benefitcamps' => 'nullable|array'
        ]);

        $bootcamps = Bootcamp::findorfail($id);
        $bootcamps->judul_bootcamp = $validatedData['judul_bootcamp'];
        $bootcamps->harga = $validatedData['harga'];
        $bootcamps->harga_diskon = $validatedData['harga_diskon'];
        $bootcamps->deskripsi = $validatedData['deskripsi'];
        $bootcamps->id_benefitcamps = json_encode($request->input('id_benefitcamps'));

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
