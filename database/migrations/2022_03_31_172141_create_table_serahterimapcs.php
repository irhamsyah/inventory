<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSerahterimapcs extends Migration
{
    /*
     
     @return void
     */
    public function up()
    {
        Schema::table('serahterimapcs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pic',70);
            $table->string('jabatan',70);
            $table->string('snid',70);
            $table->string('snidmonitor',70);
            $table->string('merkpc',70);
            $table->string('modelpc',70);
            $table->date('tanggal');
            $table->string('bentuk',70);
            $table->string('cabang',70);
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
        // Schema::table('serahterimapcs', function (Blueprint $table) {
        //     //
        // });
        Schema::drop('serahterimapcs');
    }
}
