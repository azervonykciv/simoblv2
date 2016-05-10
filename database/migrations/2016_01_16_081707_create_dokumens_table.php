<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('jenis_dokumen',20);
            $table->string('posisi_dokumen',100);
            $table->string('nama_file',30);
            $table->string('file_tipe',30);
            $table->string('file_size',20);
            $table->string('lokasi_file',250);
            $table->date('tanggal_dokumen');
            $table->string('nomor_dokumen',50);
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
        Schema::drop('dokumens');
    }
}
