<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class Usermodul extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users_modul';
    protected $primaryKey = 'id_umod';
    protected $fillable = ['id_umod', 'id_session', 'id_modul'];

    public function user()
    {
        return $this->hasMany(User::class, 'id_session', 'id_session');
    }

    public function modul()
    {
        return $this->belongsTo(Manajemenmodul::class, 'id_modul', 'id_modul');
    }

    // public function umenu_akses($link, $id)
    // {
    //     return $this->whereHas('modul', function ($query) use ($link) {
    //         $query->where('link', $link);
    //     })->where('id_session', $id)->count();
    // }

    public function umenu_akses($modul, $id_session)
    {
        Log::info('Memeriksa akses modul: ' . $modul . ' untuk sesi: ' . $id_session);

        $akses = Usermodul::where('id_session', $id_session)
                    ->whereHas('modul', function ($query) use ($modul) {
                        $query->where('link', $modul);
                    })

                    ->count();

        Log::info("Query hasil: " . json_encode($akses));
        Log::info('Jumlah akses ditemukan untuk modul ' . $modul . ': ' . $akses);

        return $akses > 0 ? 1 : 0;
    }


}
