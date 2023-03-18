<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBentukToDatakomputerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datakomputer', function (Blueprint $table) {
            //
            $table->string('bentuk',20)->nullable()->after('modelpc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datakomputer', function (Blueprint $table) {
            //
            $table->dropColumn('bentuk');
        });
    }
}
