<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoPathToPemilihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('pemilih', function (Blueprint $table) {
        $table->string('foto_path')->nullable();
    });
}

public function down()
{
    Schema::table('pemilih', function (Blueprint $table) {
        $table->dropColumn('foto_path');
    });
}

}
