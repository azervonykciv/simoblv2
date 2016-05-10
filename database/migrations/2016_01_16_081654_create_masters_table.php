<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('witel',50);
            $table->string('nmr_ao',20);
            $table->string('pelanggan',50);
            $table->string('alamat_pelanggan',200);
            $table->string('nama_proj',100);
            $table->string('lingkup_pekerjaan',500);
            $table->string('segmen',100);
            $table->string('jenis_tender',20);
            $table->string('mitra',20);
            $table->string('sub_mitra_pelaksana',20);
            $table->string('masa_kontrak',7);
            $table->string('skema_pembayaran',11);
            $table->integer('nilai_sph');
            $table->integer('nilai_negos');
            $table->integer('total_revenue');
            $table->integer('revenue_cpe');
            $table->integer('beban_cpe');
            $table->integer('margin_cpe');
            $table->string('skema_bisnis');
            $table->date('time_delivery');
            $table->string('progress_delivery');
            $table->date('tanggal_project');
            $table->string('nama_osm',30);
            $table->string('nik_osm',30);
            $table->string('jab_osm',30);
            $table->string('nama_mgr_bid',30);
            $table->string('nik_mgr_bidding',30);
            $table->string('jab_bidding',30);
            $table->string('nama_mgr_ebis',30);
            $table->string('jab_mgr_ebis',30);
            $table->string('nama_asman_bidd_witel',30);
            $table->string('jab_asman_bid_wit',30);
            $table->string('nama_am',30);
            $table->string('jab_am',30);
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
        Schema::drop('masters');
    }
}
