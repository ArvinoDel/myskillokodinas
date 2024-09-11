<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'benefit';
    protected $primaryKey = 'id_benefit';
    protected $fillable = ['id_benefit','nama_benefit'];

    public function berlangganans()
    {
        return $this->belongsToMany(Berlangganan::class, 'list_benefit', 'id_benefit', 'id_berlangganan');
    }
}

