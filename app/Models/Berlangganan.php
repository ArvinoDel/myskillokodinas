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
        'is_populer'
    ];

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'list_benefit', 'id_berlangganan', 'id_benefit');
    }
}