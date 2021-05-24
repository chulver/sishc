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
        Serviciomedico::create(['serviciomedico' => 'CONSULTA MEDICA']);
        Serviciomedico::create(['serviciomedico' => 'CURACION']);
        Serviciomedico::create(['serviciomedico' => 'RESULTADO LABORATORIO']);
        Serviciomedico::create(['serviciomedico' => 'RESULTADO RX']);
        Serviciomedico::create(['serviciomedico' => 'SUERO']);
        Serviciomedico::create(['serviciomedico' => 'PAP']);
        Serviciomedico::create(['serviciomedico' => 'RESULTADO PAP']);
        Serviciomedico::create(['serviciomedico' => 'ECOGRAFIA']);
    }
}
