<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_tra';
    protected $table = 'trainer';
    protected $fillable = ['id_tra', 'id_trainer', 'foto', 'nama_trainer'];

    public function trainer_program_group()
    {
        return $this->belongsTo(Trainerprogramgroup::class, 'id_trainer', 'id_trainer');
    }

}
