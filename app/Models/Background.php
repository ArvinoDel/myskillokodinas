<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'background';
    protected $primaryKey = 'id_background';
    protected $fillable = ['id_background','gambar'];
}
