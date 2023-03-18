<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaacaraprintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritaacaraprinters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pic',70);
            $table->string('jabatan',70);
            $table->string('snid',70);
            $table->string('merk',70);
            $table->string('model',70);
            $table->date('tanggal');
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
        Schema::dropIfExists('beritaacaraprinters');
    }
}
