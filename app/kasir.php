<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kasir extends Model
{
    protected $table = 'kasir';

    protected $fillable = [
        'nama_pasien',
        'kode_resep',
        'harga_pembelian',
        'tanggal_pembelian'
    ];

}
