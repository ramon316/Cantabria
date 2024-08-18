<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons = [
            'Cliente nuevo primera visita',
            'Cliente nuevo segunda visita',
            'Firma de contrato',
            'Visita cliente Cantabria',
            'Ensayo cliente',
            'Degustacion pastel',
            'Degustacion Banquete',
            'Prueba de mateleria',
            'Prueba floral',
            'Recepcion de Pago',
            'Recepción de anfitriones para especificaciones del evento',
        ];

        foreach ($reasons as $reason) {
            DB::table('reasons')->insert([
                'reason' => $reason,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        };
    }
}
