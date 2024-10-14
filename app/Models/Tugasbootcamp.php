<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasbootcamp extends Model
{  
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id_tugas_bootcamp';
    protected $table = 'tugas_bootcamp';
    protected $fillable = ['id_tugas_bootcamp', 'url', 'judul_tugas', 'deskripsi', 'file', 'id_bootcamp', 'status'];


    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }
}
