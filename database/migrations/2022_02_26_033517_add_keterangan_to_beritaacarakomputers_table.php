<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeteranganToBeritaacarakomputersTable extends Migration
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
            $table->string('keterangan',100)->nullable()->after('tanggal');
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
            // 2. Drop the column
            $table->dropColumn('keterangan');
        });
    }
}
