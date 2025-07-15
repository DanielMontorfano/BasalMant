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
            $table->string('solicitante')->nullable();
            $table->string('fechaNecesidad')->nullable();
            $table->string('asignadoA')->nullable();
            $table->string('prioridad')->nullable();
            
            $table->string('aprobadoPor')->nullable();
            $table->string('fechaEntrega')->nullable();
            $table->string('realizadoPor', 500)->nullable();
            $table->string('fechaAprobado')->nullable();
            
            $table->string('det1', 500)->nullable();
            $table->string('det2', 500)->nullable();
            $table->string('det3', 500)->nullable();
            $table->string('estado')->nullable();
            
            $table->string('fechaVerificado')->nullable();
            $table->string('VerificadaPor')->nullable();
            
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
