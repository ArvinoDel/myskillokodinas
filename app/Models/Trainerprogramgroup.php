<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainerprogramgroup extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_tgroup';
    protected $table = 'trainer_program_group';
    protected $fillable = ['id_tgroup', 'id_trainer', 'id_kategori'];


    public function trainer()
    {
        return $this->hasMany(Trainer::class, 'id_trainer', 'id_trainer');
    }

    public function kategori_program()
    {
        return $this->hasMany(Kategoriprogram::class, 'id_kategori', 'id_kategori');
    }

}
