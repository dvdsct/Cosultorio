<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Persona;
use App\Models\Profile;
use Illuminate\Database\Seeder;


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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'profile_photo_path' =>'img/usuario.jpg',
            'password' => bcrypt('admin@159'),
        ])->assignRole('admin');

        User::create([
            'name' => 'secretaria',
            'email' => 'secre@gmail.com',
            'profile_photo_path' =>'img/usuario.jpg',
            'password' => bcrypt('Secre@159'),
        ])->assignRole('secretaria');

        User::create([
            'name' => 'Walter',
            'email' => 'ariel@consultorio.com',
            'profile_photo_path' =>'img/usuario.jpg',
            'password' => bcrypt('medico@159'),
        ])->assignRole('medico');

        User::create([
            'name' => 'Maria',
            'email' => 'maria@consultorio.com',
            'profile_photo_path' =>'img/usuario.jpg',
            'password' => bcrypt('medico@159'),
        ])->assignRole('medico');




    }
}
