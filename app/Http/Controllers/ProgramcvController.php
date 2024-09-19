<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Programcv;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramcvController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $masa_berlangganan = $request->masa_berlangganan;

        $query = Programcv::query();

        if (!empty($search)) {
            $query->where('masa_berlangganan', 'like', "%$search%")
                ->orWhere('harga_berlangganan', 'like', "%$search%");
        }

        if (!empty($masa_berlangganan)) {
            $query->where('masa_berlangganan', $masa_berlangganan);
        }

        $programcvs = $query->paginate(10);

        $masa_berlangganans = Programcv::select('masa_berlangganan')
            ->groupBy('masa_berlangganan')
            ->get();

        foreach ($programcvs as $programcv) {
            $programcv->id_benefits = json_decode($programcv->id_benefits); // Decode JSON
        }

        return view('administrator.programcv.index', compact(['programcvs', 'masa_berlangganans']));
    }


    public function create()
    {
        // Fetch all benefits to be displayed in the form
        $benefits = Benefit::all();

        // Return the create view with the benefits data
        return view('administrator.programcv.create', compact('benefits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_programcv' => 'required',
            'masa_berlangganan' => 'required',
            'harga_berlangganan' => 'required',
            'harga_diskon' => 'nullable',
            'is_active' => 'nullable|boolean',
            'is_populer' => 'nullable|boolean',
            'id_benefits' => 'nullable|array',
        ]);

        $data = $request->all();
        $data['id_benefits'] = json_encode($request->input('id_benefits'));
        $data['id_programcv'] = Str::uuid();

        Programcv::create($data);

        return response()->json([
            'url' => route('administrator.programcv.index'),
            'success' => true,
            'message' => 'Data Program CV Berhasil Ditambah'
        ]);
    }


    public function show($id)
    {
        $programcvs = Programcv::findOrFail($id);
        return view('administrator.programcv.show', compact('programcvs'));
    }

    public function edit($id_berlangganan)
    {
        $programcvs = Programcv::findOrFail($id_berlangganan);
        $programcvs->id_benefits = json_decode($programcvs->id_benefits); // Decode JSON if necessary

        // Fetch all benefits for the view
        $benefits = Benefit::all();

        return view('administrator.programcv.edit', compact('programcvs', 'benefits'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_programcv' => 'required',
            'masa_berlangganan' => 'required',
            'harga_berlangganan' => 'required',
            'harga_diskon' => 'nullable',
            'is_active' => 'nullable|boolean',
            'is_populer' => 'nullable|boolean',
            'id_benefits' => 'nullable|array',
        ]);

        $programcvs = Programcv::findOrFail($id);
        $data = $request->all();
        $data['id_benefits'] = json_encode($request->input('id_benefits')); // Convert to JSON

        $programcvs->update($data);

        return response()->json([
            'url' => route('administrator.programcv.index'),
            'success' => true,
            'message' => 'Data Berlangganan Berhasil Diperbarui'
        ]);
    }


    public function destroy($id)
    {
        $programcvs = Programcv::findOrFail($id);
        $programcvs->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
