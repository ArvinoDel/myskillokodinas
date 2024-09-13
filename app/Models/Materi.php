<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_materi';
    protected $table = 'materi';
    protected $fillable = ['id_materi', 'nama_materi', 'id_program'];


    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program', 'id_program');
    }

    public function isimateri()
    {
        return $this->hasMany(Isimateri::class, 'id_materi', 'id_materi');
    }
}
