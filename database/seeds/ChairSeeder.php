<?php

namespace Database\Seeders;

use App\chair;
use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        chair::create([
            'typechair' =>  'Carlos magno',
            'color' =>  'negro',
            'amount'    =>  40
        ]);

        chair::create([
            'typechair' =>  'Carlos magno',
            'color' =>  'blanco',
            'amount'    =>  40
        ]);

        chair::create([
            'typechair' =>  'Channel',
            'color' =>  'dorado',
            'amount'    =>  148
        ]);

        chair::create([
            'typechair' =>  'Channel',
            'color' =>  'negro',
            'amount'    =>  100
        ]);

        chair::create([
            'typechair' =>  'Phoenix',
            'color' =>  'gris',
            'amount'    =>  298
        ]);

        chair::create([
            'typechair' =>  'Bistro',
            'color' =>  'Unico',
            'amount'    =>  190
        ]);

        chair::create([
            'typechair' =>  'Ghost',
            'color' =>  'negro',
            'amount'    =>  100
        ]);

        chair::create([
            'typechair' =>  'Ghost',
            'color' =>  'blanco',
            'amount'    =>  100
        ]);

        chair::create([
            'typechair' =>  'Banco',
            'color' =>  'negro',
            'amount'    =>  90
        ]);
    }
}
