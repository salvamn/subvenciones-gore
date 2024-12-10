<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonesTable extends Migration
{

public function up()
{
    Schema::create('salones', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->integer('aforo');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('salones');
}

}
