<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('paket_id')->unsigned()->nullable();
            $table->integer('destinasi_id')->unsigned()->nullable();
            $table->integer('pemesan_id')->unsigned();
            $table->bigInteger('harga_total');
            $table->date('tanggal');
            $table->string('foto_pembayaran')->nullable();
            $table->enum('status', ['Belum Dibayar', 'Sudah Dibayar']);
            $table->timestamps();


            
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('paket_id')
                    ->references('id')
                    ->on('paket')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('destinasi_id')
                    ->references('id')
                    ->on('destinasi')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('pemesan_id')
                    ->references('id')
                    ->on('pemesan')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
