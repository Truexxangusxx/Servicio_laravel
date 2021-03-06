<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atencions', function (Blueprint $table) {
            $table->string('nombre')->nullable();
            $table->string('dni')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atencions', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('dni');
        });
    }
}
