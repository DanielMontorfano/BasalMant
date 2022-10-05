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
        Schema::create('prototarea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proto_id')->nullable();
            $table->unsignedBigInteger('tarea_id')->nullable();
            $table->string('check1')->nullable(); //Indica que es un accesorio
            $table->timestamps();
            $table->foreign('proto_id')->references('id')->on('protocolos')->onDelete('cascade');
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
        Schema::dropIfExists('prototareas');
    }
};
