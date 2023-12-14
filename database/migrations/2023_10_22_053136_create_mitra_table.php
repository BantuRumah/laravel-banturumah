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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('layanan')->nullable();
            $table->bigInteger('umur');
            $table->string('radius')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('mobilitas')->nullable();
            $table->enum('status', ['menunggu', 'tersedia', 'tidak tersedia'])->default('tersedia');
            $table->bigInteger('harga');
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
        Schema::dropIfExists('mitra');
    }
};
