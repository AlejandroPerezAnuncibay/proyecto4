<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaTareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_proyecto');

            $table->foreign('id_proyecto')->references('id')->on('Proyectos')->onDelete('cascade');
            $table->date('fecha_vencimiento');
            $table->unsignedBigInteger('usuario_asignado');

            $table->foreign('usuario_asignado')->references('id')->on('users')->onDelete('cascade');
            $table->string('descripcion');
            $table->boolean('realizado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tareas');
    }
}
