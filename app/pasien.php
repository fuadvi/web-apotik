<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'nama_pasien',
        'jenis_kelamin',
        'tanggal_lahir',
        'slug'
    ];
}
