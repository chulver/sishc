<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'JUAN GABRIEL CHULVER CABRERA',
            'email' => 'jgchulver@chulver.com',
            'password' => bcrypt('200301810')
        ])->assignRole('Admin');

        User::create([
            'name' => 'PAMELA LOPEZ LEDEZMA',
            'email' => 'drapamela@chulver.com',
            'password' => bcrypt('2016')
        ])->assignRole('Medico');

        User::create([
            'name' => 'ZAIDA',
            'email' => 'zaida@chulver.com',
            'password' => bcrypt('6574')
        ])->assignRole('Enfermera');

        User::create([
            'name' => 'SILVIA',
            'email' => 'silvia@chulver.com',
            'password' => bcrypt('5820')
        ])->assignRole('Enfermera');

        User::create([
            'name' => 'MONICA',
            'email' => 'monica@chulver.com',
            'password' => bcrypt('7842')
        ])->assignRole('Enfermera');
        
        User::create([
            'name' => 'LISBET',
            'email' => 'lisbet@chulver.com',
            'password' => bcrypt('3987')
        ])->assignRole('Enfermera');

        User::create([
            'name' => 'ADMINISTRADOR',
            'email' => 'adm@chulver.com',
            'password' => bcrypt('3030')
        ])->assignRole('Admin');
    }
}
