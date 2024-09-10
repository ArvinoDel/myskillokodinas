<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_member';
    protected $table = 'member';
    protected $fillable = ['id_member', 'nama', 'email', 'password'];
}
