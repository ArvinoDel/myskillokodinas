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
    protected $fillable = ['id_bootcamp', 'judul_bootcamp', 'thumbnail', 'harga', 'harga_diskon', 'deskripsi','id_benefitcamps'];

    protected $casts = [
        'id_benefitcamps' => 'array', // Cast id_benefits to an array
    ];

    public function benefit()
    {
        return Benefitbootcamp::whereIn('id_benefitcamp', $this->id_benefitcamps)->get();
    }

    public function batch()
    {
        return $this->hasMany(Batch::class, 'id_bootcamp', 'id_bootcamp');
    }
}
