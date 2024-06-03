<?php

namespace Database\Seeders;

use App\Tipo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class tipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Tipo::create([
            'tipo'  => 'Social'
        ]);

        Tipo::create([
            'tipo'  => 'Graduación'
        ]);
        Tipo::create([
            'tipo'  => 'Aniversario'
        ]);
        Tipo::create([
            'tipo'  => 'Posada'
        ]);
        Tipo::create([
            'tipo'  => 'Empresarial'
        ]);
    }
}
