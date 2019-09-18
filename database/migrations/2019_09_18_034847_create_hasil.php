<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->float('khdkurang',6,2);
            $table->float('khdcukup',6,2);
            $table->float('khdbaik',6,2);
            $table->float('tjbrendah',6,2);
            $table->float('tjbsedang',6,2);
            $table->float('tjbtinggi',6,2);
            $table->float('kdskurang',6,2);
            $table->float('kdscukup',6,2);
            $table->float('kdsbaik',6,2);
            $table->float('maxtinggi',6,2);
            $table->float('maxrendah',6,2);
            $table->float('z1',6,2);
            $table->float('z2',6,2);
            $table->float('m1',6,2);
            $table->float('m2',6,2);
            $table->float('m3',6,2);
            $table->float('a1',6,2);
            $table->float('a2',6,2);
            $table->float('a3',6,2);
            $table->float('z',6,2);
            $table->rememberToken();
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
        Schema::dropIfExists('hasil');
    }
}
