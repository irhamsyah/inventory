<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBentukToBeritaacarakomputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beritaacarakomputers', function (Blueprint $table) {
            //
            $table->string('bentuk',70)->nullable()->after('tanggal');
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
            $table->dropColumn('bentuk');
        });
    }
}
