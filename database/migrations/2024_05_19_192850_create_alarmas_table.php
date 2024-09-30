<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlarmasTable extends Migration
{
    public function up()
    {
       
        Schema::create('alarmas', function (Blueprint $table) {
            // Agregar campo para el ID de la orden de trabajo relacionada
            $table->id();
            $table->unsignedBigInteger('orden_trabajo_id')->nullable();
            $table->string('asignadoA')->nullable();
            $table->string('solicitante')->nullable();
            $table->string('prioridad')->nullable();
            $table->timestamps();
            // Definir clave foránea para la orden de trabajo relacionada
            $table->foreign('orden_trabajo_id')->references('id')->on('orden_trabajos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alarmas');
       
    }
}
