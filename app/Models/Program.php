<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_program';
    protected $table = 'program';
    protected $fillable = ['id_program', 'id_trainer', 'judul_program', 'keterangan', 'harga', 'gambar', 'tanggal', 'id_kategori_program'];

    // Relasi ke Trainer
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'id_trainer', 'id_trainer');
    }  

    // Relasi ke KategoriProgram
    public function kategoriProgram()
    {
        return $this->belongsTo(KategoriProgram::class, 'id_kategori_program', 'id_kategori_program');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'id_program', 'id_program');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'id_program', 'id_program');
    }
}
