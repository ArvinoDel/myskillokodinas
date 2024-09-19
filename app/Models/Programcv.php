<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programcv extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'program_cv';
    protected $primaryKey = 'id_programcv';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_programcv',
        'nama_programcv',
        'masa_berlangganan',
        'harga_berlangganan',
        'harga_diskon',
        'is_active',
        'is_populer',
        'id_benefits',
    ];

    protected $casts = [
        'id_benefits' => 'array', // Cast id_benefits to an array
    ];

    // Method to get the associated benefits
    public function benefitscv()
    {
        return Benefit::whereIn('id_benefit', $this->id_benefits)->get();
    }

}
