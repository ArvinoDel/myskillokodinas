<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Album;
use App\Models\Mitra;
use App\Models\Video;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Materi;
use App\Models\Metode;
use App\Models\Poling;
use App\Models\Trainer;
use App\Models\Bootcamp;
use App\Models\Template;
use App\Models\Programcv;
use App\Models\Testimoni;
use App\Models\Background;
use App\Models\Bannerhome;
use App\Models\Menuwebsite;
use App\Models\Sekilasinfo;
use App\Models\Alamatkontak;
use App\Models\Bannerslider;
use App\Models\Berlangganan;
use Illuminate\Http\Request;
use App\Models\Kategoriprogram;
use App\Models\Identitaswebsite;
use App\Models\Metodepembayaran;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mitra = Mitra::orderBy('id', 'ASC')->get();
        $metod = Metode::all();
        $logo_bawah = Metodepembayaran::all();
        // dd($mitra);
        $trainer = Trainer::all();
        $banners = Bannerslider::orderBy('id_banner', 'ASC')->get();
        $album = Album::all();
        $testimonis = Testimoni::all();
        // dd($testimonis);
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $links = Bannerhome::orderBy('id_iklantengah', 'ASC')->get();
        // dd($menus);
        $gambar = $request->query('gambar', 'default'); // Mengambil parameter 'gambar' dari query string
        // $background = Background::where('gambar', $gambar)->first();

        // if ($background) {
        //     return response()->json(['color' => $background->gambar]);
        // } else {
        //     return response()->json(['color' => 'darkslateblue']); // Warna default jika tidak ditemukan
        // }
        $templateDinas4 = Template::where('folder', 'myskill')->first();
        $templateDinas3 = Template::where('folder', 'dinas-3')->first();
        $templateDinas2 = Template::where('folder', 'dinas-2')->first();
        $templateDinas1 = Template::where('folder', '')->first();

        return view('myskill.pages.home', compact('logo', 'banners', 'links', 'album', 'testimonis', 'mitra', 'metod', 'logo_bawah', 'trainer'));
    }

    public function learning(Request $request)
    {

        $trainer = Trainer::all();
        $testimonis = Testimoni::all();
        $categories = Kategoriprogram::all();
        $berlangganans = Berlangganan::all();
        $materis = Materi::all();
        foreach ($berlangganans as $berlangganan) {
            $berlangganan->id_benefits = json_decode($berlangganan->id_benefits); // Decode JSON
        }
        return view('./myskill/pages/e-learning/e-learning', compact('testimonis', 'berlangganans', 'trainer', 'categories', 'materis'));
    }

    public function bootcamp(Request $request)
    {
        $testimonis = Testimoni::all();
        $banners = Bannerslider::all();
        $album = Album::all();
        $bootcamps = Bootcamp::all();
        // dd($testimonis);
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $links = Bannerhome::orderBy('id_iklantengah', 'ASC')->limit(10)->get();
        // dd($menus);
        $gambar = $request->query('gambar', 'default'); // Mengambil parameter 'gambar' dari query string
        // $background = Background::where('gambar', $gambar)->first();

        // if ($background) {
        //     return response()->json(['color' => $background->gambar]);
        // } else {
        //     return response()->json(['color' => 'darkslateblue']); // Warna default jika tidak ditemukan
        // }
        $templateDinas4 = Template::where('folder', 'myskill')->first();
        $templateDinas3 = Template::where('folder', 'dinas-3')->first();
        $templateDinas2 = Template::where('folder', 'dinas-2')->first();
        $templateDinas1 = Template::where('folder', '')->first();

        return view('myskill.pages.program.bootcamp', compact('testimonis', 'logo', 'banners', 'links', 'album', 'bootcamps'));
    }

    public function review(Request $request)
    {
        $testimonis = Testimoni::all();
        $banners = Bannerslider::all();
        $album = Album::all();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $links = Bannerhome::orderBy('id_iklantengah', 'ASC')->limit(10)->get();
        $gambar = $request->query('gambar', 'default');
        $programs = Programcv::all();
        foreach ($programs as $program) {
            $program->id_benefits = json_decode($program->id_benefits); // Decode JSON
        }
        // Mengambil parameter 'gambar' dari query string
        // $background = Background::where('gambar', $gambar)->first();

        // if ($background) {
        //     return response()->json(['color' => $background->gambar]);
        // } else {
        //     return response()->json(['color' => 'darkslateblue']); // Warna default jika tidak ditemukan
        // }
        $templateDinas4 = Template::where('folder', 'myskill')->first();
        $templateDinas3 = Template::where('folder', 'dinas-3')->first();
        $templateDinas2 = Template::where('folder', 'dinas-2')->first();
        $templateDinas1 = Template::where('folder', '')->first();

        return view('myskill.pages.cv.review', compact('testimonis', 'logo', 'banners', 'links', 'album', 'programs', 'program'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $links = Bannerhome::orderBy('id_iklantengah', 'ASC')->limit(10)->get();
        // return view('dinas-1.sliderlogo', compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //

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
    public function destroy(string $id)
    {
        //
    }
}
