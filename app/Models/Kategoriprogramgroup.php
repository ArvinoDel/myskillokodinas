<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriprogramgroup extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $primaryKey = 'id_kgroup';
    protected $table = 'kategori_program_group';
    protected $fillable = ['id_program', 'id_kategori'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program', 'id_program');
    }

    public function kategori_program()
    {
        return $this->belongsTo(Kategoriprogram::class, 'id_kategori', 'id_kategori');
    }
}
