<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dpt_id');
            $table->unsignedBigInteger('koor_id');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('NoTlpn')->nullable();
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
            $table->timestamps();

            $table->foreign('dpt_id')->references('id')->on('dpt');
            $table->foreign('koor_id')->references('id')->on('koordinator');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saksi');
    }
}
