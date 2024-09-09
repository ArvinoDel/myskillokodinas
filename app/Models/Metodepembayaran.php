<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodepembayaran extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = ['id','gambar'];
}
