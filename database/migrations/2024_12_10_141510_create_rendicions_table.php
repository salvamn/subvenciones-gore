<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendicionsTable extends Migration
{
    public function up()
    {
        Schema::create('rendiciones', function (Blueprint $table) {
            $table->id(); // id autoincremental
            $table->integer('numero_de_rendicion'); // Número de la rendición
            $table->date('fecha_de_ingreso'); // Fecha de ingreso
            $table->date('fecha_de_cierre'); // Fecha de cierre
            $table->integer('dias'); // Días
            $table->decimal('monto_rendido', 15, 2); // Monto rendido
            $table->decimal('monto_aprobado', 15, 2); // Monto aprobado
            $table->decimal('monto_observado', 15, 2); // Monto observado
            $table->string('analista'); // Nombre del analista
            $table->unsignedBigInteger('proyecto_id'); // Clave foránea para relacionar la rendición con un proyecto
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rendiciones');
    }
}
