<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Identitaswebsite;
use App\Models\Pesanmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class PesanmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendReply(Request $request, string $id): RedirectResponse
    {
        Log::info('sendReply method called'); // Logging untuk debugging

        $pesan = Pesanmasuk::where('id_hubungi', $id)->firstOrFail();
        $balasan = $request->input('balasan');

        $emailContent = $this->generateEmailContent($pesan, $balasan);

        // Tambahkan UUID ke nama file untuk memastikan nama unik
        $fileName = 'mail-' . now()->format('Ymd-His') . '-' . Str::slug($pesan->subjek) . '.eml';
        $filePath = 'public/emails/' . $fileName;

        Storage::put($filePath, $emailContent);

        Log::info('Email content saved to file: ' . $filePath); // Logging untuk debugging

        return redirect()->route('administrator.pesanmasuk.show', $id)->with('success', 'Email sukses terkirim ke ' . $pesan->email . '. File disimpan di ' . $filePath);
    }

    private function generateEmailContent($pesan, $balasan)
    {
        $to = $pesan->email;
        $subject = "=?UTF-8?Q?" . str_replace(' ', '=20', $pesan->subjek) . "?=";
        $from = "admin@gmt.web.id";
        $date = now()->format('D, d M Y H:i:s O');
        $messageId = "<" . uniqid() . "@gmt.web.id>";

        $headers = [
            "To: $to",
            "Subject: $subject",
            "From: \"gmt.web.id\" <$from>",
            "Return-Path: <$from>",
            "Reply-To: <$from>",
            "User-Agent: Laravel",
            "X-Sender: $from",
            "X-Mailer: Laravel",
            "X-Priority: 3 (Normal)",
            "Message-ID: $messageId",
            "Mime-Version: 1.0",
            "Content-Type: multipart/alternative; boundary=\"B_ALT_$messageId\""
        ];

        $body = [
            "--B_ALT_$messageId",
            "Content-Type: text/plain; charset=UTF-8",
            "Content-Transfer-Encoding: 8bit",
            "",
            $balasan,
            "",
            "--B_ALT_$messageId",
            "Content-Type: text/html; charset=UTF-8",
            "Content-Transfer-Encoding: quoted-printable",
            "",
            nl2br(e($balasan)),
            "",
            "--B_ALT_$messageId--"
        ];

        return implode("\r\n", array_merge($headers, ["", ""], $body));
    }

    public function getLatestMessages()
    {
        $latestMessages = Pesanmasuk::orderBy('tanggal', 'desc')->take(5)->get();
        return $latestMessages;
    }


    public function index(Request $request): View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $pesan = Pesanmasuk::latest()
        //         ->where('id_hubungi', 'like', "%$search%")
        //         ->orWhere('nama', 'like', "%$search%")
        //         ->paginate(10);
        // } else {  
        //     $pesan = Pesanmasuk::orderBy('tanggal', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $tanggal = $request->tanggal;  

        $query = Pesanmasuk::query();

        if (!empty($search)) {
            $query->where('nama', 'like', "%$search%")->orWhere('email', 'like', "%$search%")->orWhere('subject', 'like', "%$search%")->orWhere('pesan', 'like', "%$search%")->orWhere('tanggal', 'like', "%$search%");
        }
  
        if (!empty($tanggal)) {
            $query->where('tanggal', $tanggal);
        }

        $pesan = $query->paginate(10);

        $tanggals = Pesanmasuk::select('tanggal')
                    ->groupBy('tanggal')
                    ->get();

        return view('administrator.pesanmasuk.index', compact('pesan', 'tanggals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'nullable|string|max:255',
            'pesan' => 'required|string',
        ]);

        if (empty($validatedData['subjek'])) {
            $validatedData['subjek'] = $request->ip();
        }

        // Tambahkan tanggal dan jam saat ini ke dalam data yang divalidasi
        $validatedData['tanggal'] = now();
        $validatedData['jam'] = now()->format('H:i:s');

        // Simpan data ke database
        Pesanmasuk::create($validatedData);

        // Redirect atau response sesuai kebutuhan
        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // Update status pesan menjadi dibaca
        Pesanmasuk::where('id_hubungi', $id)->update(['dibaca' => 'Y']);

        // Ambil data pesan berdasarkan id
        $pesan = Pesanmasuk::where('id_hubungi', $id)->firstOrFail();
        $alamat = Alamat::where('id_alamat', 1)->first();
        $identitas = Identitaswebsite::where('id_identitas', 1)->first();

        return view('administrator.pesanmasuk.show', compact('pesan', 'alamat', 'identitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_hubungi)
    {
        //
        $pesan = Pesanmasuk::findOrFail($id_hubungi);
        $pesan->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
