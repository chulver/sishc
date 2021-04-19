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
            $table->engine = 'InnoDB';
            $table->id();
            $table->text('motivoconsulta');
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
