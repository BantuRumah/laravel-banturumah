<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_sewa', ['harian', 'mingguan', 'bulanan']);
            $table->date('tanggal_sewa');
            $table->date('tanggal_berakhir');
            $table->date('tanggal_transaksi');
            $table->time('waktu_transaksi');
            $table->string('jumlah_harga')->nullable();
            $table->string('bukti_pembayaran');
            $table->enum('status', ['payyed', 'success', 'failed','finished'])->default('payyed');
            $table->unsignedBigInteger('mitra_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mitra_id')->references('id')->on('mitra');
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
};
