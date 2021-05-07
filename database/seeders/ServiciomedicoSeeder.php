<?php

namespace Database\Seeders;

use App\Models\Serviciomedico;

use Illuminate\Database\Seeder;

class ServiciomedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicio = new Serviciomedico();
        $servicio->serviciomedico = "CONSULTA MEDICA";

        $servicio->save();
    }
}
