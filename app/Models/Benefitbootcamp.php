<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefitbootcamp extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'benefit_bootcamp';
    protected $primaryKey = 'id_benefitcamp';
    protected $fillable = ['id_benefitcamp','nama_benefit'];

    public function bootcamps()
        {
            return $this->belongsToMany(Bootcamp::class,'id_benefitcamp', 'id_bootcamp');
        }
}

