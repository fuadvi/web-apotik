<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class obat_masuk extends Model
{
    use softDeletes;
    protected $table = 'obat_masuk';

    protected $fillable = [
        'nama_obat',
        'kode_obat',
        'harga_satuan',
        'jumlah',
        'jenis_obat',
        'tanggal_masuk'
    ];

    public function obat()
    {
        return $this->belongsTo(obat::class, 'kode_obat', 'kode_obat');
    }
}
