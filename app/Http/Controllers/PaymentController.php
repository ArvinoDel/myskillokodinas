<?php

namespace App\Http\Controllers;

use App\Models\Berlangganan; // Pastikan ini benar
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($id)
    {
        $berlangganan = Berlangganan::all();
        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'berlangganan'));
    }
}
