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
        Serviciomedico::create(['serviciomedico' => 'CONSULTA MEDICA', 'precio' => '0.0']);
        Serviciomedico::create(['serviciomedico' => 'CURACION', 'precio' => '0.0']);
        Serviciomedico::create(['serviciomedico' => 'RESULTADO LABORATORIO', 'precio' => '0.0']);
        Serviciomedico::create(['serviciomedico' => 'RESULTADO RX', 'precio' => '0.0']);
        Serviciomedico::create(['serviciomedico' => 'SUERO', 'precio' => '0.0']);
        Serviciomedico::create(['serviciomedico' => 'PAP', 'precio' => '0.0']);
        Serviciomedico::create(['serviciomedico' => 'RESULTADO PAP', 'precio' => '0.0']);
        Serviciomedico::create(['serviciomedico' => 'ECOGRAFIA', 'precio' => '0.0']);
    }
}
