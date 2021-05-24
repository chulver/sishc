<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignosvitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signosvitales', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('solicitud_consultamedica_id');
            $table->foreign('solicitud_consultamedica_id')->references('id')->on('solicitud_consultamedica');
            $table->integer('edad');
            $table->decimal('peso',10,2);
            $table->integer('talla');
            $table->decimal('temperatura',10,1);
            $table->string('presionarterial',7)->nullable();
            $table->integer('spo2')->nullable();
            $table->integer('fcardiaca')->nullable();
            $table->integer('frespiratoria')->nullable();
            $table->integer('glicemia')->nullable();
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
        Schema::dropIfExists('signosvitales');
    }
}
