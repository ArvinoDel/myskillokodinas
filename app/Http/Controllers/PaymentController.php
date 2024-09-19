<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use App\Models\Payment;
use App\Models\Programcv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Berlangganan; // Pastikan ini benar
use App\Models\Bootcamp;

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

    public function show_user()
    {
        $user = Auth::user();

        // Debug output untuk memastikan data diambil dengan benar
        $payments = Payment::where(function ($query) use ($user) {
            $query->where('contact', $user->email)
                ->orWhere('contact', $user->phone);
        })->get();

        // dd($payments); // Pastikan data diambil dengan benar

        $elearningPayments = $payments->filter(function ($payment) {
            return stripos($payment->program_name, 'Paket Video E-Learning') !== false;
        });

        $reviewPayments = $payments->filter(function ($payment){
            return stripos($payment->program_name, 'Paket Review') !== false;
        });

        $bootcampPayments = $payments->filter(function ($payment){
            return stripos($payment->program_name, 'Paket Bootcamp') !== false;
        });

        // dd($elearningPayments); // Pastikan filter diterapkan dengan benar

        return view('myskill.pages.profile.my-purchase', [
            'elearningPayments' => $elearningPayments,
            'reviewPayments' => $reviewPayments,
            'bootcampPayments' => $bootcampPayments,
        ]);
    }


    // public function show($id)
    // {
    //     // Mengambil semua data berlangganan
    //     $berlanggananss = Berlangganan::all();
    //     $metod = Metode::all();


    //     // Menyaring data berlangganan berdasarkan $id
    //     $berlanggananss = $berlanggananss->where('id_berlangganan', $id)->first();
    //     $berlanggananss->id_benefits = json_decode($berlanggananss->id_benefits); // Decode JSON

    //     // Logika untuk menampilkan halaman pembayaran
    //     // Anda bisa mengambil data berlangganan berdasarkan $id di sini
    //     return view('myskill.pages.e-learning.payment', compact('id', 'berlanggananss', 'metod'));
    // }

    public function learning($id)
    {
        $berlanggananss = Berlangganan::all();
        $metod = Metode::all();
        $langganan = "e-learning";


        // Menyaring data berlangganan berdasarkan $id
        $berlanggananss = $berlanggananss->where('id_berlangganan', $id)->first();
        $berlanggananss->id_benefits = json_decode($berlanggananss->id_benefits); // Decode JSON

        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'berlanggananss', 'metod', 'langganan'));
    }

    public function bootcamp($id)
    {
        $bootcamps = Bootcamp::all();
        $metod = Metode::all();
        $langganan = "bootcamp";


        // Menyaring data berlangganan berdasarkan $id
        $bootcamps = $bootcamps->where('id_bootcamp', $id)->first();
        $bootcamps->id_benefits = json_decode($bootcamps->id_benefits); // Decode JSON

        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'bootcamps', 'metod', 'langganan'));
    }

    public function review($id)
    {
        $metod = Metode::all();
        $programs = Programcv::all();
        $langganan = "review";


        $programs = $programs->where('id_programcv', $id)->first();
        $programs->id_benefits = json_decode($programs->id_benefits); // Decode JSON
        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'programs', 'metod', 'langganan'));
    }

    public function approve($id)
    {
        $payment = Payment::findOrFail($id);

        // Ubah status menjadi approved
        $payment->status = 'completed'; // Atau bisa menggunakan 'approved' sesuai kebutuhan
        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil disetujui!');
    }

    public function cancel($id)
    {
        $payment = Payment::findOrFail($id);

        // Ubah status menjadi canceled
        $payment->status = 'canceled';
        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dibatalkan!');
    }



    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'berlangganan_id' => 'required|string',
                'id_invoice' => 'required|string',
                'gambar' => 'required|mimes:jpeg,png,jpg', // Validasi gambar
                'payment_method' => 'required',
                'total' => 'required',
                'program_name' => 'required',
                'contact' => 'required',
                'username' => 'required',
            ]);

            // Inisialisasi variabel fileName
            $fileName = null;

            // Handle upload gambar
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('bukti_payment'), $fileName); // Simpan di public/bukti_payment
            }

            // Bersihkan format angka 'total' (hapus titik pemisah ribuan)
            $cleanedTotal = str_replace('.', '', $request->input('total'));

            // Simpan data pembayaran
            Payment::create([
                'berlangganan_id' => $request->input('berlangganan_id'),
                'id_invoice' => $request->input('id_invoice'),
                'program_name' => $request->input('program_name'),
                'username' => $request->input('username'),
                'contact' => $request->input('contact'),
                'payment_method' => $request->input('payment_method'),
                'gambar' => $fileName, // Nama file gambar
                'total' => $cleanedTotal, // Simpan total tanpa pemisah ribuan
                'payment_datetime' => now(), // Simpan waktu saat ini
                'status' => 'pending', // Status awal pembayaran
            ]);

            // Mengirim pesan sukses ke view
            return redirect()->back()->with('success', 'Pembayaran berhasil dikirim!');
        } catch (\Exception $e) {
            // Mengirim pesan error ke view
            // dd($request);
            return redirect()->back()->with('error', 'Pembayaran gagal: ' . $e->getMessage());
        }
    }
}
