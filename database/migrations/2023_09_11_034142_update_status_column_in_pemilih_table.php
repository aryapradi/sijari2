<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusColumnInPemilihTable extends Migration
{
    public function up()
    {
        Schema::table('pemilih', function (Blueprint $table) {
            $table->enum('status', ['valid', 'tidak valid'])->default('tidak valid');
        });
    }

    public function down()
    {
        Schema::table('pemilih', function (Blueprint $table) {
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
        });
    }
}
