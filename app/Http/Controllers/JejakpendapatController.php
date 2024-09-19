<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Poling;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JejakpendapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $polings = Poling::latest()
        //         ->where('id_poling', 'like', "%$search%")
        //         ->orWhere('pilihan', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $polings = Poling::orderBy('id_poling', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $status = $request->status;

        $query = Poling::query();

        if (!empty($search)) {
            $query->where('pilihan', 'like', "%$search%");
        }

        if (!empty($status)) {
            $query->where('status', $status);
        }

        $polings = $query->paginate(10);

        $statuses = Poling::select('status')
            ->groupBy('status')
            ->get();

        $berita['total_berita'] = Berita::count();
        $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
        $agenda['total_agenda'] = Agenda::count();
        $users['total_users'] = User::count();

        return view('administrator.jejakpendapat.index', compact('berita', 'halamanbaru', 'agenda', 'users', 'polings', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.jejakpendapat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'pilihan' => 'required|string',
            'status' => 'required|string',
            'aktif' => 'required|string'
        ]);

        $username = $request->username ?: 'admin';

        Poling::create([
            "pilihan" => $validated['pilihan'],
            "status" => $request->status,
            "aktif" => $request->aktif ?? 'Y',
            "username" => $username
        ]);

        return response()->json([
            'url' => route('administrator.jejakpendapat.index'),
            'success' => true,
            'message' => 'Data Jajak Pendapat Berhasil Ditambah'
        ]);
    }

    public function storePollingChoice(Request $request)
    {
        $request->validate([
            'pilihan_id' => 'required|exists:poling,id_poling',
        ]);

        // Temukan polling berdasarkan ID
        $polling = Poling::find($request->pilihan_id);
        $polling->increment('rating'); // Tambah rating

        return response()->json([
            'success' => true,
            'message' => 'Pilihan berhasil disimpan!'
        ]);
    }

    public function storePollingChoice3(Request $request)
    {
        $request->validate([
            'pilihan_id' => 'required|exists:poling,id_poling',
        ]);

        // Temukan polling berdasarkan ID
        $polling = Poling::find($request->pilihan_id);
        $polling->increment('rating'); // Tambah rating

        return response()->json([
            'success' => true,
            'message' => 'Pilihan berhasil disimpan!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        $request->validate([
            'pilihan_id' => 'required', // Pastikan ini sesuai dengan struktur data Anda
            'id_polling' => 'required|exists:pollings,id_polling', // Validasi untuk id_polling
        ]);

        // Temukan polling berdasarkan ID
        $polling = Poling::find($request->id_polling);

        // Cek jika pilihan_id ada dalam status
        if ($polling->status == $request->pilihan_id) {
            // Tambah rating jika jawaban yang dipilih sama dengan status
            $polling->increment('rating'); // Asumsikan ada kolom rating di tabel polling
        }

        // Update status polling jika diperlukan
        $polling->status = $request->pilihan_id; // Atur status sesuai pilihan
        $polling->save();

        // Redirect atau respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Pilihan berhasil disimpan!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_poling): View
    {
        //
        $poll = Poling::where('id_poling', $id_poling)->firstOrFail();
        return view('administrator.jejakpendapat.edit', compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_poling)
    {
        //
        $validated = $request->validate([
            'pilihan' => 'required|string',
            'status' => 'required|string',
            'aktif' => 'nullable|string'
        ]);

        $poling = Poling::findOrFail($id_poling);

        $poling->update([
            "pilihan" => $validated['pilihan'],
            "status" => $request->status,
            "aktif" => $request->aktif ?? 'Y'
        ]);

        return response()->json([
            'url' => route('administrator.jejakpendapat.index'),
            'success' => true,
            'message' => 'Data Jajak Pendapat Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_poling)
    {
        //
        $poling = Poling::findOrFail($id_poling);
        $poling->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
