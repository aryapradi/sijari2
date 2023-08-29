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
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->unsignedBigInteger('caleg_id');
            $table->timestamps();

            $table->foreign('caleg_id')->references('id')->on('caleg');
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
