<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materibootcamp extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_materi_bootcamp';
    protected $table = 'materi_bootcamp';
    protected $fillable = ['id_materi_bootcamp', 'url', 'judul_file', 'file', 'id_bootcamp'];


    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }
}
