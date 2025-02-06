<?php

use App\servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'nombre'    =>  'Renta 250 personas',
            'costo'     =>  78100,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Decoración evento social 250 personas',
            'costo'     =>  29000,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Barra de bebidas 200 personas',
            'costo'     =>  6650,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Grupo Orión',
            'costo'     =>  26000,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Renta 200 personas',
            'costo'     =>  67800,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Decoración 200 personas',
            'costo'     =>  26000,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Renta 300 personas',
            'costo'     =>  144300,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Mesa de dulces 200 personas',
            'costo'     =>  9900,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Barra de postres 250 personas',
            'costo'     =>  16450,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Barra de bebidas 200 personas',
            'costo'     =>  7400,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Pastel 300 personas',
            'costo'     =>  7500,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Banquete en 2 tiempos',
            'costo'     =>  260,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Bocadillos gourmet',
            'costo'     =>  800,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Cámara 360°',
            'costo'     =>  5000,
            'dias'      =>  1,
            'año'       =>  2025
        ]);
        Servicio::create([
            'nombre'    =>  'Tuba',
            'costo'     =>  2000,
            'dias'      =>  1,
            'año'       =>  2025
        ]);


    }
}
