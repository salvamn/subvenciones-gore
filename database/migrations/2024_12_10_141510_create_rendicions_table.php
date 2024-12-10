<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendicionsTable extends Migration
{
    public function up()
    {
        Schema::create('rendicions', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_de_rendicion')->nullable();
            $table->string('analista', 255)->nullable();
            $table->date('fecha_de_ingreso')->nullable();
            $table->date('fecha_de_cierre')->nullable();
            $table->integer('dias')->nullable();
            $table->decimal('monto_rendido', 15, 2)->nullable();
            $table->decimal('monto_aprobado', 15, 2)->nullable();
            $table->decimal('monto_observado', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rendicions');
    }
}
