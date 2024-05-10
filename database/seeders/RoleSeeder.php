<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = Role::create(['name'=>'admin']);
        $medico = Role::create(['name'=>'medico']);
        $secretaria = Role::create(['name'=>'secretaria']);
        $su = Role::create(['name'=>'su']);


        $read = Permission::create(['name'=>'read']);
        $create = Permission::create(['name'=>'create']);
        $crearturno = Permission::create(['name'=>'crearturno']);
        $update = Permission::create(['name'=>'update']);
        $delete = Permission::create(['name'=>'delete']);
        $supervisar = Permission::create(['name'=>'supervisar']);

        $turnos = Permission::create(['name'=>'turnos']);
        $atender = Permission::create(['name'=>'atender']);
        $colpos = Permission::create(['name'=>'colpos']);
        $consultas = Permission::create(['name'=>'consultas']);
        $recetar = Permission::create(['name'=>'recetar']);


        $recetar->assignRole([$admin,$medico, $secretaria]);
        $turnos->assignRole([$admin,$medico]);
        $atender->assignRole($medico);
        $colpos->assignRole($medico);
        $consultas->assignRole($medico);
        $turnos->assignRole($secretaria);


        $delete->assignRole($admin,$su);
        $supervisar->assignRole([$su]);
        $update->assignRole($admin,$su);


    }
}
