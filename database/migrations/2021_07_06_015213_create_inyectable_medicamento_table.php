<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInyectableMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inyectable_medicamento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inyectable_id');
            $table->foreign('inyectable_id')->references('id')->on('inyectable');
            $table->foreignId('medicamento_id');
            $table->foreign('medicamento_id')->references('id')->on('medicamento');
            $table->string('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inyectable_medicamento');
    }
}
