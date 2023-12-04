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
        $atender = Permission::create(['name'=>'atender']);
        $update = Permission::create(['name'=>'update']);
        $delete = Permission::create(['name'=>'delete']);
        $supervisar = Permission::create(['name'=>'supervisar']);


        $read->assignRole([$admin,$medico]);
        $supervisar->assignRole([$su]);
        $atender->assignRole($medico);
        $delete->assignRole($admin,$su);
        $update->assignRole($admin,$su);
        $crearturno->assignRole($secretaria);


    }
}
