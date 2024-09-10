<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $email = $request->email;

        $query = Member::query();

        if (!empty($search)) {
            $query->where('nama', 'like', "%$search%")->orWhere('email', 'like', "%$search%");
        }

        if (!empty($email)) {
            $query->where('email', $email);
        }

        $members = $query->paginate(10);

        $emails = Member::select('email')
                    ->groupBy('email')
                    ->get();

        return view('administrator.member.index', compact(['members', 'emails']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        Member::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return response()->json([
            'url' => route('administrator.member.index'),
            'success' => true,
            'message' => 'Data Member Berhasil Ditambah'
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
        $members = Member::findOrFail($id);
        return view('administrator.member.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $members = Member::findOrFail($id);

        $validated = $request->validate([
            "nama" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        // Jika password diisi, enkripsi password baru
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            // Jika password tidak diisi, gunakan password lama
            unset($validated['password']);
        }

        $members->update([
            "nama" => $validated['nama'],
            "email" => $validated['email']
        ]);

        return response()->json([
            'url' => route('administrator.member.index'),
            'success' => true,
            'message' => 'Data Member Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $members = Member::findOrFail($id);
        $members->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
