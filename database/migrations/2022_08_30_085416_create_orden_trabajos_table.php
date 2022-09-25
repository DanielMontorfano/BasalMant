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
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->string('de')->nullable();
            $table->string('para')->nullable();
            $table->string('per_abre')->nullable();
            $table->string('fecha1')->nullable();
            $table->string('det1', 500)->nullable();
            
            $table->string('per_cierra')->nullable();
            $table->string('fecha2')->nullable();
            $table->string('det2', 500)->nullable();
            $table->string('estado')->nullable();
            $table->string('creador')->nullable();
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
