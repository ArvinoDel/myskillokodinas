<?php

namespace App\Http\Controllers;

use App\Models\Benefitbootcamp;
use Illuminate\Http\Request;

class BenefitbootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search'); // Retrieve the search query from the request
    
        // Initialize the query to get benefits
        $query = Benefitbootcamp::query();
    
        // If a search term is provided, filter the results
        if (!empty($search)) {
            $query->where('nama_benefit', 'like', "%$search%");
        }
    
        // Execute the query and paginate the results
        $benefits = $query->paginate(10);
    
        // Pass the $benefits variable to the view
        return view('administrator.benefitbootcamp.index', compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.benefitbootcamp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_benefit' => 'required|string|max:255',
        ]);

        // Create the new benefit
        Benefitbootcamp::create($validatedData);

        return response()->json([
            'url' => route('administrator.benefitbootcamp.index'),
            'success' => true,
            'message' => 'Data benefit berhasil ditambah',
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
    public function edit(string $id_benefitcamp)
    {
        //
        $benefit = Benefitbootcamp::findOrFail($id_benefitcamp);
        return view('administrator.benefitbootcamp.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_benefitcamp)
    {
        //
        $validatedData = $request->validate([
            'nama_benefit' => 'required|string|max:255',
        ]);

        // Find and update the benefit
        $benefit = Benefitbootcamp::findOrFail($id_benefitcamp);
        $benefit->update($validatedData);

        return response()->json([
            'url' => route('administrator.benefitbootcamp.index'),
            'success' => true,
            'message' => 'Data benefit berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_benefitcamp)
    {
        //
        $benefit = Benefitbootcamp::findOrFail($id_benefitcamp);
        $benefit->delete();

        return response()->json(['message' => 'Data benefit berhasil dihapus.']);
    }
}
