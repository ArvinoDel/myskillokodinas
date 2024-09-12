<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berlangganan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'berlangganan';
    protected $primaryKey = 'id_berlangganan';
    protected $fillable = [
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
    public function benefits()
    {
        return Benefit::whereIn('id_benefit', $this->id_benefits)->get();
    }
}
