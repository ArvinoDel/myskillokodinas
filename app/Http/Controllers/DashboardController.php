<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Agenda;
use App\Models\Manajemenmodul;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        // Logic specifically for users that should see the home view
        $users['user'] = User::where('username', session('username'))->first();
        return view('myskill.pages.home', compact('users'));
    }

    public function index()
    {
        $berita['total_berita'] = Berita::count();
        $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
        $agenda['total_agenda'] = Agenda::count();
        $users['total_users'] = User::count();
        $user = User::where('username', session('username'))->first();

        if ($user->level === 'admin') {
            $berita['total_berita'] = Berita::count();
            $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
            $agenda['total_agenda'] = Agenda::count();
            $users['total_users'] = User::count();
            $user = User::where('username', session('username'))->first();
            $manajemenmodul = Manajemenmodul::all();

            $view = 'administrator.dashboard';
            return view($view, compact('manajemenmodul', 'berita', 'halamanbaru', 'agenda', 'users'));
        } elseif ($user->level === 'pengajar') {
            $users['pengajar'] = $user;
            $view = 'pengajar.dashpengajar';
            return view($view, compact('berita', 'halamanbaru', 'agenda', 'users'));
        } else {
            return redirect()->route('home');
        }
    }
}
