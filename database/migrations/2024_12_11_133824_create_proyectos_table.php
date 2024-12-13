<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id(); // id autoincremental
            $table->string('institucion'); // Institución
            $table->string('rut'); // RUT de la institución
            $table->decimal('monto', 15, 2); // Monto total del proyecto
            $table->decimal('monto_por_rendir', 15, 2); // Monto por rendir
            $table->string('proyecto'); // Nombre del proyecto
            $table->string('estado'); // Estado del proyecto (activo, finalizado, etc.)
            $table->string('duracion'); // Duración del proyecto (por ejemplo: "12 meses")
            $table->date('fecha_pago'); // Fecha de pago
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
