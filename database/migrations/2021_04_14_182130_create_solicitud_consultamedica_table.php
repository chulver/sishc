<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudConsultamedicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_consultamedica', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('numeroturno');
            $table->foreignId('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('paciente');
            $table->foreignId('serviciomedico_id');
            $table->foreign('serviciomedico_id')->references('id')->on('serviciomedico');
            $table->string('medico');
            $table->char('estado',1);
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
        Schema::dropIfExists('solicitud_consultamedica');
    }
}
