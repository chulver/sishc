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
            'email' => 'pamela.lopez@chulver.com',
            'password' => bcrypt('2021')
        ])->assignRole('Medico');

        User::create([
            'name' => 'ZAIDA',
            'email' => 'zaida@chulver.com',
            'password' => bcrypt('2021')
        ])->assignRole('Enfermera');
    }
}
