<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'id_tugas';
    protected $table = 'tugas';
    protected $fillable = ['id_tugas', 'url', 'judul_tugas', 'deskripsi', 'file', 'id_materi', 'status'];


    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
}
