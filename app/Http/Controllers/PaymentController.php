<?php

namespace App\Http\Controllers;

use App\Models\Berlangganan; // Pastikan ini benar
use App\Models\Metode;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($id)
    {
        // Mengambil semua data berlangganan
        $berlanggananss = Berlangganan::all();
        $metod = Metode::all();

        // Menyaring data berlangganan berdasarkan $id
        $berlanggananss = $berlanggananss->where('id_berlangganan', $id)->first();

        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'berlanggananss', 'metod'));
    }
}
