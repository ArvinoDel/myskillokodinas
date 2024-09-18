<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'batch';
    protected $primaryKey = 'id_batch';
    protected $fillable = ['id_batch', 'nama_sesi', 'tanggal_mulai', 'tanggal_selesai', 'id_bootcamp'];

    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }
}
