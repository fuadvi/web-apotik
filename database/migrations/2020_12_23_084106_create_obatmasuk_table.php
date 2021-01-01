<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('kode_obat');
            $table->string('harga_satuan');
            $table->string('jumlah');
            $table->string('jenis_obat');
            $table->string('tanggal_masuk');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_masuk');
    }
}
