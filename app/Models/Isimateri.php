<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isimateri extends Model
{
    use HasFactory;

    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_isi_materi';
    protected $table = 'isi_materi';
    protected $fillable = ['id_isi_materi', 'url', 'judul_file', 'file', 'id_materi'];


    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
}
