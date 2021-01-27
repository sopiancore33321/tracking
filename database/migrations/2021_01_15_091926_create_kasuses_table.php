<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jumlah_positif');
            $table->integer('jumlah_negatif');
            $table->integer('jumlah_meninggal');
            $table->integer('jumlah_sembuh');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_negaras');
            $table->foreign('id_negaras')->references('id')
            ->on('negaras')->onDelete('cascade');
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
        Schema::dropIfExists('kasuses');
    }
}
