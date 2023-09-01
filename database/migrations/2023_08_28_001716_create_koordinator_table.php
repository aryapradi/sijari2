<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoordinatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koordinator', function (Blueprint $table) {
            $table->id();
            $table->string('nama_koordinator');
            $table->string('username');
            $table->string('password');
            $table->string('NoTlpn')->nullable();
            $table->char('provinsi');
            $table->char('kabupaten');
            $table->char('kecamatan');
            $table->char('kelurahan');
            $table->unsignedBigInteger('caleg_id');
            $table->timestamps();

            $table->foreign('caleg_id')->references('id')->on('caleg');
            $table->foreign('provinsi')->references('id')->on('provinces');
            $table->foreign('kabupaten')->references('id')->on('regencies');
            $table->foreign('kecamatan')->references('id')->on('districts');
            $table->foreign('kelurahan')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koordinator');
    }
}
