<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilih', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saksi_id')->nullable();
            $table->string('NoTlpn')->nullable();
            $table->string('foto')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable()->unique();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('jalan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('disabilitas')->nullable();
            $table->string('kota')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('tps')->nullable();
            $table->unsignedBigInteger('dpt_id');
            $table->timestamps();

            $table->foreign('saksi_id')->references('id')->on('saksi')->onDelete('cascade');
            $table->foreign('dpt_id')->references('id')->on('dpt')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilih');
    }
}
