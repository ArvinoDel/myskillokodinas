<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'bootcamps';
    protected $primaryKey = 'id_bootcamp';
    protected $fillable = ['id_bootcamp', 'judul_bootcamp', 'thumbnail', 'tanggal_mulai', 'tanggal_selesai', 'harga', 'harga_diskon', 'sesi', 'deskripsi','id_benefitcamps']; 
    
    protected $casts = [
        'id_benefitcamps' => 'array', // Cast id_benefits to an array
    ];

    public function benefit()
    {
        return Benefitbootcamp::whereIn('id_benefitcamp', $this->id_benefitcamps)->get();
    }
}
