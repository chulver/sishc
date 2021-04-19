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
            $table->engine = 'InnoDB';
            $table->id();
            $table->double('peso',3,2);
            $table->integer('talla');
            $table->integer('pasistolica');
            $table->integer('padiastolica');
            $table->integer('fcardiaca');
            $table->integer('frespiratoria');
            $table->double('temperatuta',2,1);
            $table->date('fum');
            $table->string('observaciones')->nullable();
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
