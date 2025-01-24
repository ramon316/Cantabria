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
            'banco' =>  'Efectivo',
            'cuenta'    =>  'Efectivo',
            'number'     =>  '0',
            'moneda'    =>  'Pesos',
            'amount'    =>  null,
        ]);
    }
}
