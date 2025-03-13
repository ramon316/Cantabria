<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
            'name' => 'Administrador',
            'email' => 'administrador@cantabriaeventos.com',
            'color' => '#cb3414',
            'password' => Hash::make('Administrador'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Planeación',
            'email' => 'planeacion@cantabriaeventos.com',
            'color' => '#4833ca',
            'password' => Hash::make('Planeacion'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Planeacion');

        User::create([
            'name' => 'Ventas',
            'email' => 'ventas@cantabriaeventos.com',
            'color' => '#4833ca',
            'password' => Hash::make('Ventas'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Ventas');

        User::create([
            'name' => 'Florista',
            'email' => 'florista@cantabriaeventos.com',
            'color' => '#4833ca',
            'password' => Hash::make('Florista'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Florista');

        User::create([
            'name' => 'Banquete',
            'email' => 'banquete@cantabriaeventos.com',
            'color' => '#4833ca',
            'password' => Hash::make('Banquete'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Banquete');
    }
}
