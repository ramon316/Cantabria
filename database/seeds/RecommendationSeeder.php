<?php

namespace Database\Seeders;

use App\recommendation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* recommendation::factory(6)->create(); */
        recommendation::create([
            'name'  =>  'Ramon',
            'comment'   =>  'este es un comentario',
            'image' =>  '1',
        ]);
    }
}
