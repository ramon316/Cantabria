<?php

use App\cliente;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Generamos un seder para el usuario
        cliente::create([
            'nombre'=>'Evelin Acosta',
            'telefono'=>'6141234567',
            'email'=>'evelin@hotmail.com',
            'calle'=>'Bolivar',
            'numero'=>'7799',
            'colonia'=>'Potreros',
            'cp'=>'31000',
            'user_id'=>'1',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        cliente::create([
            'nombre'=>'Anahi Marina Buso Medina',
            'telefono'=>'6141329579',
            'email'=>'anahi@gmail.com',
            'calle'=>'33',
            'numero'=>'1302',
            'colonia'=>'Santo niño',
            'cp'=>'31200',
            'user_id'=>'24',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        cliente::create([
            'nombre'=>'Nereyda Aime Chavez Dominguez',
            'telefono'=>'6141611725',
            'email'=>'nereda@gmail.com',
            'calle'=>'Universidad de las americas',
            'numero'=>'9723',
            'colonia'=>'Residencial Universidad',
            'cp'=>'31125',
            'user_id'=>'24',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        cliente::create([
            'nombre'=>'Katia Michelle Orpineda Garcia',
            'telefono'=>'6145130656',
            'email'=>'katia@gmail.com',
            'calle'=>'Cumbres del vesubio',
            'numero'=>'2012',
            'colonia'=>'Residencial Cumbres',
            'cp'=>'31216',
            'user_id'=>'24',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
