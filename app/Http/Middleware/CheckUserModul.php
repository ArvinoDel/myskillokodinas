<?php

namespace App\Http\Middleware;

use App\Models\Usermodul;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class CheckUserModul
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $modul)
    {

        // Tambahkan log untuk memeriksa nilai parameter dan sesi pengguna

        $user = $request->user();
        Log::info('Memeriksa akses middleware untuk modul: ' . $modul . ' dan user session ID: ' . $user->id_session);

        $akses = Usermodul::where('id_session', $user->id_session)
                ->whereHas('modul', function ($query) use ($modul) {
                    $query->where('link', $modul);
                })
                ->count();
        Log::info('Akses ditemukan di middleware: ' . $akses);

        if ($akses < 1 && $user->level != 'admin') {
            // Jika pengguna tidak memiliki akses dan bukan admin, redirect ke halaman error atau halaman lain
            Log::info('Tidak memiliki akses untuk modul: ' . $modul);

            return redirect('error_page');
        }

        return $next($request);
    }

}
