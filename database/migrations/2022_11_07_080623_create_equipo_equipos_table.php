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
        Schema::create('equipo_equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->unsignedBigInteger('vinc_id')->nullable();
            $table->string('check1')->nullable(); //Indica que es un accesorio
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('vinc_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_equipos');
    }
};
