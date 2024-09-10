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
    protected $fillable = ['id_materi', 'judul_materi'];
}
