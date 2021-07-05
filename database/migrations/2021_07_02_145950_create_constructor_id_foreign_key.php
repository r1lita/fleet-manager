<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructorIdForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->bigInteger('constructor_id')->unsigned()->nullable();
            $table->foreign('constructor_id')->references('id')->on('constructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // $table->dropForeign('vehicles_contrictor_id_foreign');
            // $table->dropColumn('constructor_id');
        });
    }
}
