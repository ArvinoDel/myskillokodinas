<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = ['id_invoice','program_name','payment_datetime','username','contact','payment_method','gambar','total','status'];
}
