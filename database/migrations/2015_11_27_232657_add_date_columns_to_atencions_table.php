<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateColumnsToAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atencions', function (Blueprint $table) {
            $table->timestamp('fecha_generado')->nullable();
            $table->timestamp('fecha_asignado')->nullable();
            $table->timestamp('fecha_atendido')->nullable();
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
            $table->dropColumn('fecha_generado');
            $table->dropColumn('fecha_asignado');
            $table->dropColumn('fecha_atendido');
        });
    }
}
