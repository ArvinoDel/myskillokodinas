<?php

namespace App\Http\Controllers;

use App\Models\Berlangganan;
use Illuminate\Http\Request;

class BerlanggananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $masa_berlangganan = $request->masa_berlangganan;

        $query = Berlangganan::query();

        if (!empty($search)) {
            $query->where('masa_berlangganan', 'like', "%$search%")->orWhere('harga_berlangganan', 'like', "%$search%");
        }

        if (!empty($masa_berlangganan)) {
            $query->where('masa_berlangganan', $masa_berlangganan);
        }

        $berlangganans = $query->paginate(10);

        $masa_berlangganans = Berlangganan::select('masa_berlangganan')
                    ->groupBy('masa_berlangganan')
                    ->get();

        return view('administrator.berlangganan.index', compact(['berlangganans', 'masa_berlangganans']));
    }

    public function create()
    {
        return view('administrator.berlangganan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'masa_berlangganan' => 'required',
            'harga_berlangganan' => 'required',
            'harga_diskon' => 'nullable',
            'is_active' => 'nullable|boolean',
            'is_populer' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->input('is_active');
        $data['is_populer'] = $request->input('is_populer');

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
        return view('administrator.berlangganan.edit', compact('berlangganan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'masa_berlangganan' => 'required',
            'harga_berlangganan' => 'required',
            'harga_diskon' => 'nullable',
            'is_active' => 'nullable|boolean',
            'is_populer' => 'nullable|boolean',
        ]);

        $berlangganan = Berlangganan::findOrFail($id);
        $data = $request->all();
        $data['is_active'] = $request->input('is_active');
        $data['is_populer'] = $request->input('is_populer');

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