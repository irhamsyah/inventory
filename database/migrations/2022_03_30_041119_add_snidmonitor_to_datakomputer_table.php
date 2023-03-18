<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSnidmonitorToDatakomputerTable extends Migration
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
            $table->string('snidmonitor',70)->nullable()->after('snid');
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
            $table->dropColumn('snidmonitor');
        });
    }
}
