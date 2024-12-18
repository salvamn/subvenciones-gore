<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodigoProyectoToProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->string('codigo_proyecto')->nullable(); // Permite valores nulos
        });
    }
    

    /**
     * Deshace las modificaciones de la migración.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar la columna "codigo_proyecto" si se hace rollback de la migración
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('codigo_proyecto');
        });
    }
}
