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
        Schema::create('equipo_repuesto', function (Blueprint $table) {
           
                $table->id();
                $table->unsignedBigInteger('equipo_id')->nullable();
                $table->unsignedBigInteger('repuesto_id')->nullable();
                $table->integer('cant')->nullable();
                $table->string('unidad')->nullable(); //unidad de medida
                $table->string('check1')->nullable(); //Indica que es un accesorio
                $table->timestamps();
                $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
                $table->foreign('repuesto_id')->references('id')->on('repuestos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_repuestos');
    }
};
