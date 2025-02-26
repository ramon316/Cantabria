<?php

namespace Database\Seeders;

use App\tableclothbase;
use Illuminate\Database\Seeder;

class tableclothbaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        tableclothbase::create([
            'color' =>  'Rosa',
            'amount'    =>  '7',
            'tabletype' =>  'Cuadrada',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Dorada',
            'amount'    =>  '22',
            'tabletype' =>  'Cuadrada',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Dorada',
            'amount'    =>  '21',
            'tabletype' =>  'Redonda',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Negro',
            'amount'    =>  '10',
            'tabletype' =>  'Cuadrada',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Negro',
            'amount'    =>  '20',
            'tabletype' =>  'Redonda',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Ivory',
            'amount'    =>  '17',
            'tabletype' =>  'Cuadrada',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Plata',
            'amount'    =>  '18',
            'tabletype' =>  'Cuadrada',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Plata',
            'amount'    =>  '33',
            'tabletype' =>  'Redonda',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Negro',
            'amount'    =>  '10',
            'tabletype' =>  'Imperial',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'N/A',
            'amount'    =>  '10',
            'tabletype' =>  'Redonda',
            'status'    =>  'bueno',
        ]);

        Tableclothbase::create([
            'color' =>  'Ivory',
            'amount'    =>  '10',
            'tabletype' =>  'Redonda',
            'status'    =>  'bueno',
        ]);
    }
}
