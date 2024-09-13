<?php

namespace App\Http\Controllers;

use App\Models\Identitaswebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class IdentitaswebsiteController extends Controller
{
    /**
     * Menampilkan form edit identitas website.
     */
    public function edit(): View
    {
        $identitaswebsite = Identitaswebsite::first();
        return view('administrator.identitaswebsite.edit', compact('identitaswebsite'));
    }

    /**
     * Update identitas website.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            "nama_website" => 'required|string|max:255',
            "email" => 'required|email',
            "domain" => 'required|url',
            "sosial_media" => 'required|url',
            "rekening" => 'required',
            "no_telp" => 'required',
            "meta_deskripsi" => 'required',
            "meta_keyword" => 'required',
            "maps" => 'required|url',
            "favicon" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $identitaswebsite = Identitaswebsite::first(); // Mengambil identitas pertama

        $faviconName = $identitaswebsite->favicon; // Simpan nama favicon lama

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = $favicon->getClientOriginalName();
            $favicon->move(public_path('foto_identitas'), $faviconName);

            // Hapus favicon lama jika ada
            if ($identitaswebsite->favicon && Storage::exists('foto_identitas/' . $identitaswebsite->favicon)) {
                Storage::delete('foto_identitas/' . $identitaswebsite->favicon);
            }
        }

        // Update nama favicon di database
        $identitaswebsite->favicon = $faviconName;

        $identitaswebsite->update([
            "nama_website" => $validated['nama_website'],
            "email" => $validated['email'],
            "url" => $validated['domain'],
            "facebook" => $validated['sosial_media'],
            "rekening" => $validated['rekening'],
            "no_telp" => $validated['no_telp'],
            "meta_deskripsi" => $validated['meta_deskripsi'],
            "meta_keyword" => $validated['meta_keyword'],
            "maps" => $validated['maps'],
            "favicon" => $faviconName
        ]);

        session()->flash("pesan", "identitas berhasil Diperbarui");
        return redirect()->route("administrator.identitaswebsite.edit")->with('success', 'Data berhasil diperbarui');
    }
}
