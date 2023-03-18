<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCabangToBeritaacarakomputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beritaacarakomputers', function (Blueprint $table) {
            $table->string('cabang')->nullable()->after('bentuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beritaacarakomputers', function (Blueprint $table) {
            //
            $table->dropColumn('cabang');
        });
    }
}
