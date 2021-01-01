<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'foto',
        'kode_resep'
    ];
}
