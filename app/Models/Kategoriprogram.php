<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriprogram extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_kategori_program';
    protected $table = 'kategori_program';
    protected $fillable = ['id_kategori_program', 'nama_kategori'];

    // Relasi ke Program
    public function programs()
    {
        return $this->hasMany(Program::class, 'id_kategori_program', 'id_kategori_program');
    }
}
