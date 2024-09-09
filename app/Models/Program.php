<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_pro';
    protected $table = 'program';
    protected $fillable = ['id_pro', 'id_program', 'nama_program', 'tanggal', 'harga', 'keterangan', 'judul'];

    public function kategori_program_group()
    {
        return $this->hasMany(Kategoriprogramgroup::class, 'id_program', 'id_program');
    }

    public function kategoriprogram()
    {
        return $this->belongsToMany(Kategoriprogram::class, 'kategori_program_group', 'id_program', 'id_kategori');
    }
}
