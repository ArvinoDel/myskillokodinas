<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulantugas extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'id_pengumpulan';
    protected $table = 'pengumpulan_tugas';
    protected $fillable = ['id_pengumpulan', 'id', 'id_tugas', 'file', 'nilai', 'deskripsi'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas', 'id_tugas');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
