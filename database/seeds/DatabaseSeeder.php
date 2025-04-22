<?php

use Illuminate\Database\Seeder;
use Database\Seeders\daysSeeder;
use Database\Seeders\MeetSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\tipoSeeder;
use Database\Seeders\ChairSeeder;
use Database\Seeders\AcountSeeder;
use Database\Seeders\ReasonSeeder;
use Database\Seeders\ClienteSeeder;
use Database\Seeders\ChecklistSeeder;
use Database\Seeders\floralbaseSeeder;
use Database\Seeders\tableclothSeeder;
use Database\Seeders\RecommendationSeeder;
use Database\Seeders\tableclothbaseSeeder;
use Database\Seeders\event_tablecloth_seeder;
use Database\Seeders\event_tableclothbase_seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        /* Comentar a partir de aquí para limpiar la DB */
        /* $this->call(ClienteSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(AcountSeeder::class);
        $this->call(ChecklistSeeder::class); */
        /* $this->call(MeetSeeder::class); */
        /* Comentar hasta aquí */
        $this->call(tableclothbaseSeeder::class);
        $this->call(tableclothSeeder::class);
        $this->call(floralbaseSeeder::class);
        $this->call(ChairSeeder::class);
        $this->call(RecommendationSeeder::class);
        $this->call(tipoSeeder::class);
        $this->call(daysSeeder::class);
        $this->call(ReasonSeeder::class);
        /* Mandamos llamar el roles */
    }
}
