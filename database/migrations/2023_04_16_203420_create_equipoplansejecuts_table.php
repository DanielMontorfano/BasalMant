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
        Schema::create('equipoplansejecuts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('numFormulario')->nullable();
            $table->string('codigoPlan')->nullable();
            $table->string('ejecucion')->nullable(); //Indica que es un accesorio
            $table->string('supervisor1')->nullable(); //Indica que es un accesorio
            $table->string('tecnico')->nullable(); //Indica que es un accesorio
            $table->string('pendiente')->nullable(); //Indica que es un accesorio
            $table->string('observacion')->nullable(); //Indica que es un accesorio
            $table->string('correccion')->nullable(); //Indica que es un accesorio
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipoplansejecuts');
    }
};
