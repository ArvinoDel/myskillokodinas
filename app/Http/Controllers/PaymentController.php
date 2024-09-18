<?php

namespace App\Http\Controllers;

use App\Models\Berlangganan; // Pastikan ini benar
use App\Models\Metode;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $program_name = $request->program_name;

        $query = Payment::query();

        if (!empty($search)) {
            $query->where('program_name', 'like', "%$search%");
        }

        if (!empty($program_name)) {
            $query->where('program_name', $program_name);
        }

        $payments = $query->paginate(10);


        $program_names = Payment::select('program_name')
            ->groupBy('program_name')
            ->get();
        // dd($bootcamp);

        return view('administrator.payment.index', compact('payments', 'program_names'));
    }

    public function show($id)
    {
        // Mengambil semua data berlangganan
        $berlanggananss = Berlangganan::all();
        $metod = Metode::all();


        // Menyaring data berlangganan berdasarkan $id
        $berlanggananss = $berlanggananss->where('id_berlangganan', $id)->first();
        $berlanggananss->id_benefits = json_decode($berlanggananss->id_benefits); // Decode JSON

        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'berlanggananss', 'metod'));
    }
    public function store(Request $request)
{
    Log::info('Request Data:', $request->all());

    // Validasi data yang diterima dari form
    $validatedData = $request->validate([
        'id' => 'required|string',
        'username' => 'required|string',
        'contact' => 'nullable|string',
        'program_name' => 'required|string',
        'total' => 'required|numeric',
        'payment_method' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'payment_datetime' => 'required|date',
    ]);

    // Proses upload file pembayaran
    if ($request->hasFile('gambar')) {
        $gambar = $request->file("gambar");
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path("foto_pembayaran"), $gambarName);
    }

    // Simpan data pembayaran ke database
    try {
        Payment::create([
            'id' => $validatedData['id'],
            'username' => $validatedData['username'],
            'contact' => $validatedData['contact'],
            'program_name' => $validatedData['program_name'],
            'total' => $validatedData['total'],
            'payment_method' => $validatedData['payment_method'],
            'status' => 'pending',
            'gambar' => $gambarName,
            'payment_datetime' => $validatedData['payment_datetime'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pembelian Berhasil',
            'url' => route('myskill.pages.home')
        ]);
    } catch (\Exception $e) {
        Log::error('Error saving payment: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menyimpan pembayaran'
        ], 500);
    }
}
}
