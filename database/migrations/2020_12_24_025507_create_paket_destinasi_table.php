<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketDestinasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_destinasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paket_id')->unsigned();
            $table->integer('destinasi_id')->unsigned();
            $table->timestamps();

            $table->foreign('paket_id')
                    ->references('id')
                    ->on('paket')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');;
            $table->foreign('destinasi_id')
                    ->references('id')
                    ->on('destinasi')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_destinasi');
    }
}
