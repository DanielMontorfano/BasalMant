<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareashes', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('equipo_id')->nullable();
                $table->unsignedBigInteger('tarea_id')->nullable();
                $table->unsignedBigInteger('numFormulario')->nullable();
                $table->string('plan_id')->nullable();
                $table->string('tcheck')->nullable(); //unidad de medida
                $table->string('detalle')->nullable(); //Indica que es un accesorio
                $table->string('operario')->nullable(); //Indica que es un accesorio
                $table->string('supervisor')->nullable(); //Indica que es un accesorio
                $table->timestamps();
                $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
                $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareashes');
    }
};
