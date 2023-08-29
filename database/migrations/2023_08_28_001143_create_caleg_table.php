<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caleg', function (Blueprint $table) {
            $table->id();
            $table->string('nama_caleg');
            $table->unsignedBigInteger('partai_id');
            $table->timestamps();

            $table->foreign('partai_id')->references('id')->on('partai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caleg');
    }
}
