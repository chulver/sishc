<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->id();
            $table->integer('ci')->nullable();
            $table->string('apaterno',50)->nullable();
            $table->string('amaterno',50)->nullable();
            $table->string('nombre',60);
            $table->string('sexo',10);
            $table->date('fechanacimiento');
            $table->string('especialidadmedica',50);
            $table->string('numeromatricula',12)->nullable();
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
        Schema::dropIfExists('medico');
    }
}
