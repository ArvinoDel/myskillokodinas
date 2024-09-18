<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search'); // Retrieve the search query from the request
    
        // Initialize the query to get benefits
        $query = Topik::query();
    
        // If a search term is provided, filter the results
        if (!empty($search)) {
            $query->where('nama_topik', 'like', "%$search%");
        }
    
        // Execute the query and paginate the results
        $topiks = $query->paginate(10);
    
        // Pass the $benefits variable to the view
        return view('administrator.topik.index', compact('topiks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.topik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_topik' => 'required|string|max:255',
        ]);

        // Create the new benefit
        Topik::create($validatedData);

        return response()->json([
            'url' => route('administrator.topik.index'),
            'success' => true,
            'message' => 'Data topik berhasil ditambah',
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
        $topik = Topik::findOrFail($id);
        return view('administrator.topik.edit', compact('topik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_topik)
    {
        //
        $validatedData = $request->validate([
            'nama_topik' => 'required|string|max:255',
        ]);

        // Find and update the benefit
        $topik = Topik::findOrFail($id_topik);
        $topik->update($validatedData);

        return response()->json([
            'url' => route('administrator.topik.index'),
            'success' => true,
            'message' => 'Data topik berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_topik)
    {
        //
        $topik = Topik::findOrFail($id_topik);
        $topik->delete();

        return response()->json(['message' => 'Data Topik berhasil dihapus.']);
    }
}
