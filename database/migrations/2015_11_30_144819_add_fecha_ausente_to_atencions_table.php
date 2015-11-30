<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechaAusenteToAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atencions', function (Blueprint $table) {
            $table->timestamp('fecha_ausente')->nullable();
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
            $table->dropColumn('fecha_ausente');
        });
    }
}
