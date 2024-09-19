<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'topik';
    protected $primaryKey = 'id_topik';
    protected $fillable = ['id_topik', 'nama_topik'];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_topik');
    }
}
