<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_hasil', function (Blueprint $table) {
            $table->bigIncrements('id_hasil');

            $table->bigInteger('id_dokter')->unsigned();
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');
            
            $table->integer('alamat');
            $table->integer('lama_inap');
            $table->integer('keterangan');
            $table->date('tanggal');
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
        Schema::dropIfExists('table_hasil');
    }
}
