<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Medico']);
        $role3 = Role::create(['name' => 'Enfermera']);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);

        Permission::create(['name' => 'consultas.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'consultas.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'consultas.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'consultas.destroy'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'consultas.fichas'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'signosvitales.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'signosvitales.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'signosvitales.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'signosvitales.completadas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'signosvitales.show'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'historiaclinica.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historiaclinica.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historiaclinica.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historiaclinica.completadas'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'pacientes.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'pacientes.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'pacientes.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'pacientes.show'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'generarPDF'])->syncRoles([$role1, $role2]);
    }
}
