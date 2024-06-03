<?php

namespace Database\Seeders;

use App\Checklist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Checklist::create([
            'evento_id' => 1,
        ]);
        Checklist::create([
            'evento_id' => 2,
        ]);
        Checklist::create([
            'evento_id' => 3,
        ]);
        Checklist::create([
            'evento_id' => 4,
        ]);
    }
}
