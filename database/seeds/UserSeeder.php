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
            'name' => 'Ramon316',
            'email' => 'ramon316@hotmail.com',
            'color' => '#cb3414',
            'password' => Hash::make('IkKkEoqg(Sh51iWL'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Yuliana Anaya',
            'email' => 'yuliana.anaya@cantabriaeventos.com',
            'color' => '#4833ca',
            'password' => Hash::make('Mq5vzbmj03'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Administrador');
    }
}
