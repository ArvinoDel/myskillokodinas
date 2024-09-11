<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'rating_program';
    protected $primaryKey = 'id_rating';
    public $timestamps = false;

    protected $fillable = ['id_program', 'jml_rating', 'id'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    // Relasi ke Program
    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program', 'id_program');
    }
}