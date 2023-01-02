<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'kamar';

    protected $primaryKey = 'no_kamar';


    protected $fillable = [
         'nama_kamar', 'kelas_kamar', 'status_kamar', 'tanggal'
    ];
}
