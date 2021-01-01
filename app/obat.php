<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'kode_obat',
        'harga_satuan',
        'stock_obat',
        'jenis_obat'
    ];


    public function obatMasuk()
    {
        return $this->hasMany(obat_masuk::class, 'kode_obat', 'kode_obat');
    }
    public function resep()
    {
        return $this->hasMany(resep::class, 'id', 'obat_id');
    }
}
