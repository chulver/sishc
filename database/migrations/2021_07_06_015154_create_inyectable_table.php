<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInyectableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inyectable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('paciente');
            $table->string('diagnostico');
            $table->string('via');
            $table->decimal('precio',10,2);
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
        Schema::dropIfExists('inyectable');
    }
}
