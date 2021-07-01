<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTableVehiclesToVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('vehicles', function (Blueprint $table) {
        //     $table->dropForeign(['constructor_id']);
        // });

        // Schema::rename('vehicles', 'vehicles');

        // Schema::table('vehicles', function (Blueprint $table) {
        //     $table->foreign('constructor_id')->references('id')->on('constructor')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
        });
    }
}
