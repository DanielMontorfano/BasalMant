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
        $table->integer('frecuencia')->nullable(); // 2024
        $table->string('unidad')->nullable(); // 2024
        $table->integer('frecuenciaPlanEnDias')->nullable(); // 2024
        $table->string('ejecucion')->nullable();
        $table->unsignedBigInteger('user_id')->nullable(); // 2024
        $table->string('supervisor1')->nullable();
        $table->string('tecnico')->nullable();
        $table->string('pendiente')->nullable();
        $table->string('observacion')->nullable();
        $table->string('correccion')->nullable();
        $table->timestamps();

        // Definir las claves foráneas para mantener integridad referencial
        $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('set null');
        $table->foreign('plan_id')->references('id')->on('plans')->onDelete('set null');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
