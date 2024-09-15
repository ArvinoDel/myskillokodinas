<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_materi';
    protected $table = 'materi';
    protected $fillable = ['id_materi', 'nama_materi', 'thumbnail', 'id_kategori_program', 'rating'];


    public function kategoriprogram()
    {
        return $this->belongsTo(Kategoriprogram::class, 'id_kategori_program');
    }

    public function isimateri()
    {
        return $this->hasMany(Isimateri::class, 'id_materi', 'id_materi');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
