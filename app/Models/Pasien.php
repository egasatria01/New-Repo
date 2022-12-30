<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'pasien';
    protected $primaryKey = 'id_spesialis';


    protected $fillable = [
        'nama_spesialis', 'tanggal'
    ];
}
