<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            // pada id tidak perlu ditambahkan  ->primary()
            $table->id();
            $table->string('nama_pic',70);
            $table->string('jabatan',70);
            $table->string('snid',70);
            $table->string('merkpc',70);
            $table->string('modelpc',70);
            $table->date('tanggal');
            $table->string('bentuk',70)->nullable();
            $table->string('cabang')->nullable();
            $table->string('keterangan',100)->nullable();
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
        Schema::dropIfExists('logs');
    }
}
