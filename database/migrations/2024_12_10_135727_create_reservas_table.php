<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
// database/migrations/xxxx_xx_xx_xxxxxx_create_reservas_table.php

public function up()
{
    Schema::create('reservas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
        $table->foreignId('id_salon')->constrained('salones')->onDelete('cascade');
        $table->time('hora_inicio');
        $table->time('hora_fin');
        $table->date('fecha');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('reservas');
}

}
