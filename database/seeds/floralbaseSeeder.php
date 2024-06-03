<?php

namespace Database\Seeders;

use App\floralbase;
use Illuminate\Database\Seeder;

class floralbaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        floralbase::create([
            'name'      =>  'Austria',
            'amount'    =>  '5',
            'category'  =>  'Plateadas',
        ]);

        floralbase::create([
            'name'      =>  'Bahamas',
            'amount'    =>  '6',
            'category'  =>  'Plateadas',
        ]);
    }
}
