<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class resep extends Model
{
    use softDeletes;

    protected $table = 'reseps';


    protected $fillable = [
        'obat_id',
        'pasien_id',
        'dokter_id',
        'dosis',
        'jumlah',
        'tanggal_resep',
        'slug',
    ];

    // relasi pada tabel
    public function obat()
    {
        return $this->belongsTo(obat::class, 'obat_id', 'id');
    }
    public function pasien()
    {
        return $this->belongsTo(pasien::class, 'pasien_id', 'id');
    }
    public function dokter()
    {
        return $this->belongsTo(dokter::class, 'dokter_id', 'id');
    }
}
