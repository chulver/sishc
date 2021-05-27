<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaclinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiaclinica', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('solicitud_consultamedica_id');
            $table->foreign('solicitud_consultamedica_id')->references('id')->on('solicitud_consultamedica');
            $table->integer('anios');
            $table->integer('meses');
            $table->integer('dias');
            $table->text('motivoconsulta');
            $table->text('enfermedadactual');
            $table->text('examenfisico');
            $table->text('analisisclinico');
            $table->text('planaccion');
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
        Schema::dropIfExists('historiaclinica');
    }
}
