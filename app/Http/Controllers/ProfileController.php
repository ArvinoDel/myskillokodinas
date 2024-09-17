<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Menampilkan form profil
    public function edit()
    {
        $user = Auth::user();
        // dd($user); // Harusnya muncul di sini
        return view('myskill.pages.profile.my-profile', compact('user'));
    }

    // Mengupdate profil
    public function update(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'level' => 'nullable|string|max:20',
            'blokir' => 'nullable|in:Y,N',
        ]);

        $user = Auth::user();

        // Update data user
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->email = $request->input('email');
        $user->no_telp = $request->input('no_telp');
        $user->level = $request->input('level');
        $user->blokir = $request->input('blokir');

        // Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('./foto_user'), $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('home')->with('status', 'Profil berhasil diperbarui.');
    }
}
