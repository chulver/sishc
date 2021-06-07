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

        Permission::create(['name' => 'users.index',
                            'description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit',
                            'description' => 'Asignar rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index',
                            'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create',
                            'description' => 'Crear role'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit',
                            'description' => 'Editar role'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy',
                            'description' => 'Eliminar role'])->syncRoles([$role1]);

        Permission::create(['name' => 'consultas.index',
                            'description' => 'Ver listado de ventas'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'consultas.create',
                            'description' => 'Crear venta'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'consultas.edit',
                            'description' => 'Editar venta'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'consultas.destroy',
                            'description' => 'Anular venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'consultas.show',
                            'description' => 'Ver venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'consultas.fichas',
                            'description' => 'Ver listado de fichas'])->syncRoles([$role1]);

        Permission::create(['name' => 'signosvitales.index',
                            'description' => 'Ver Listado de signos vitales pendientes'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'signosvitales.create',
                            'description' => 'Registrar signos vitales'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'signosvitales.edit',
                            'description' => 'Editar signos vitales'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'signosvitales.completadas',
                            'description' => 'Ver listado de signos vitales completados'])->syncRoles([$role1]);
        Permission::create(['name' => 'signosvitales.show',
                            'description' => 'Ver signos vitales'])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'historiaclinica.index',
                            'description' => 'Ver listado de atenciones pendientes'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'historiaclinica.create',
                            'description' => 'Registrar atencion medica'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'historiaclinica.edit',
                            'description' => 'Finalizar atencion medica'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'historiaclinica.completadas',
                            'description' => 'Ver listado de atencines completadas'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'pacientes.index',
                            'description' => 'Ver Listado de pacientes'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'pacientes.create',
                            'description' => 'Registrar nuevo paciente'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'pacientes.edit',
                            'description' => 'Editar datos del paciente'])->syncRoles([$role1]);
        Permission::create(['name' => 'pacientes.show',
                            'description' => 'Ver datos del paciente'])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'generarPDF',
                            'description' => 'Genera PDF de la Historia Clinica'])->syncRoles([$role1,$role2]);
    }
}
