<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriprogram extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_kat';
    protected $table = 'kategori_program';
    protected $fillable = ['id_kat', 'id_kategori', 'nama_kategori'];

    public function kategori_program_group()
    {
        return $this->belongsTo(Kategoriprogramgroup::class, 'id_kategori', 'id_kategori');
    }
}
