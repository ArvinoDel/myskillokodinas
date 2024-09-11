<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'id_metode';
    protected $fillable = ['id_metode','gambar','nama_pembayaran','pembayaran'];

}
