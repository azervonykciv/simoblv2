<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('projectId');
            $table->foreign('projectId')->references('id')->on('masters')->onDelete('cascade');
            $table->string('no_p1');
            $table->string('tgl_p1');
            $table->string('no_p2');
            $table->string('tgl_p2');
            $table->string('no_p3');
            $table->string('tgl_p3');
            $table->string('no_p4');
            $table->string('tgl_p4');
            $table->string('no_p5');
            $table->string('tgl_p5');
            $table->string('no_p6');
            $table->string('tgl_p6');
            $table->string('no_p7');
            $table->string('tgl_p7');
            $table->string('no_p8');
            $table->string('tgl_p8');
            $table->string('no_kl');
            $table->string('tgl_kl');
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
        Schema::drop('agendas');
    }
}
