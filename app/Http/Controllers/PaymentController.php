<?php

namespace App\Http\Controllers;

use App\Models\Berlangganan; // Pastikan ini benar
use App\Models\Metode;
use Illuminate\Http\Request;

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
}
