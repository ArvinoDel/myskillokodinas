<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasMenuAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, HasMenuAccess, Notifiable;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'menu_access' => 'array',
    ];

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'username', // Tambahkan baris ini
        'nama_lengkap',
        'email',
        'level',
        'foto',
        'blokir',
        'no_telp',
        'id_session',
        'password',
        'is_subscribed',
        'paket_langganan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function user_modul()
    {
        return $this->belongsTo(UserModul::class, 'id_session', 'id_session');
    }

    // public function hasAccessTo($modulName)
    // {
    //     // Cek apakah pengguna adalah admin
    //     if ($this->level == 'admin') {
    //         return true;
    //     }

    //     // Cek apakah pengguna memiliki akses ke modul tertentu
    //     $modul = Manajemenmodul::where('nama_modul', $modulName)->first();
    //     if ($modul && in_array($modul->id_modul, $this->menu_access)) {
    //         return true;
    //     }

    //     return false;
    // }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'id', 'id');
    }

    public function pengajar()
    {
        return $this->hasMany(Trainer::class, 'id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
