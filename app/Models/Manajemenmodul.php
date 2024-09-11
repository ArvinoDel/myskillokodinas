<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manajemenmodul extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_modul';
    protected $table = 'modul';
    protected $fillable = ['id_modul', 'nama_modul', 'username', 'link', 'publish', 'status', 'aktif', 'urutan', 'static_content', 'gambar', 'link_seo']; // Kolom yang dapat diisi

    public function user_modul()
    {
        return $this->hasMany(Usermodul::class, 'id_modul', 'id_modul');
    }
}
