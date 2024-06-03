<?php

namespace Database\Seeders;

use App\cuenta;
use Illuminate\Database\Seeder;

class AcountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cuenta::create([
            'banco' =>  'BBVA',
            'cuenta'    =>  'Azul',
            'clabe'     =>  '123456789',
            'moneda'    =>  'Pesos',
            'amount'    =>  null,
        ]);

        cuenta::create([
            'banco' =>  'Caja Chica',
            'cuenta'    =>  'Caja Chica',
            'clabe'     =>  '123456789',
            'moneda'    =>  'Pesos',
            'amount'    =>  null,
        ]);
    }
}
