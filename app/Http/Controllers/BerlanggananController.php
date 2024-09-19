<?php

namespace App\Http\Controllers;

use App\Models\Berlangganan;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BerlanggananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $masa_berlangganan = $request->masa_berlangganan;

        $query = Berlangganan::query();

        if (!empty($search)) {
            $query->where('masa_berlangganan', 'like', "%$search%")
                ->orWhere('harga_berlangganan', 'like', "%$search%");
        }

        if (!empty($masa_berlangganan)) {
            $query->where('masa_berlangganan', $masa_berlangganan);
        }

        $berlangganans = $query->paginate(10);

        $masa_berlangganans = Berlangganan::select('masa_berlangganan')
            ->groupBy('masa_berlangganan')
            ->get();

        foreach ($berlangganans as $berlangganan) {
            $berlangganan->id_benefits = json_decode($berlangganan->id_benefits); // Decode JSON
        }

        return view('administrator.berlangganan.index', compact(['berlangganans', 'masa_berlangganans']));
    }


    public function create()
    {
        // Fetch all benefits to be displayed in the form
        $benefits = Benefit::all();

        // Return the create view with the benefits data
        return view('administrator.berlangganan.create', compact('benefits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'masa_berlangganan' => 'required',
            'harga_berlangganan' => 'required',
            'harga_diskon' => 'nullable',
            'is_active' => 'nullable|boolean',
            'is_populer' => 'nullable|boolean',
            'id_benefits' => 'nullable|array',
        ]);

        $data = $request->all();
        $data['id_benefits'] = json_encode($request->input('id_benefits')); // Convert to JSON
        $data['id_berlangganan'] = Str::uuid(); // Contoh menggunakan uniqid()

        Berlangganan::create($data);

        return response()->json([
            'url' => route('administrator.berlangganan.index'),
            'success' => true,
            'message' => 'Data Berlangganan Berhasil Ditambah'
        ]);
    }


    public function show($id)
    {
        $berlangganan = Berlangganan::findOrFail($id);
        return view('administrator.berlangganan.show', compact('berlangganan'));
    }

    public function edit($id_berlangganan)
    {
        $berlangganan = Berlangganan::findOrFail($id_berlangganan);
        $berlangganan->id_benefits = json_decode($berlangganan->id_benefits); // Decode JSON if necessary
    
        // Fetch all benefits for the view
        $benefits = Benefit::all();
    
        return view('administrator.berlangganan.edit', compact('berlangganan', 'benefits'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'masa_berlangganan' => 'required',
            'harga_berlangganan' => 'required',
            'harga_diskon' => 'nullable',
            'is_active' => 'nullable|boolean',
            'is_populer' => 'nullable|boolean',
            'id_benefits' => 'nullable|array',
        ]);

        $berlangganan = Berlangganan::findOrFail($id);
        $data = $request->all();
        $data['id_benefits'] = json_encode($request->input('id_benefits')); // Convert to JSON

        $berlangganan->update($data);

        return response()->json([
            'url' => route('administrator.berlangganan.index'),
            'success' => true,
            'message' => 'Data Berlangganan Berhasil Diperbarui'
        ]);
    }


    public function destroy($id)
    {
        $berlangganan = Berlangganan::findOrFail($id);
        $berlangganan->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
