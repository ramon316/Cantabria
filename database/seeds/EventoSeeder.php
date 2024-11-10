<?php
use App\evento;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Evento::create([
            'cliente_id'=>'1',
            'user_id'=>'1',
            'title'=>'Social',
            'subTitle'=>'Boda',
            'start'=>date('Y-m-d H:i:s'),
            'end'=>date('Y-m-d H:i:s'),
            'invitados'=>250,
            'color'=>'#0000ff',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        Evento::create([
            'cliente_id'=>'2',
            'user_id'=>'1',
            'title'=>'Social',
            'subTitle'=>'Boda',
            'start'=>Carbon::create('2024', '04', '20'),
            'end'=>Carbon::create('2024', '04', '21'),
            'invitados'=>250,
            'color'=>'#0000ff',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        Evento::create([
            'cliente_id'=>'3',
            'user_id'=>'1',
            'title'=>'Social',
            'subTitle'=>'Boda',
            'start'=>Carbon::create('2024', '11', '29'),
            'end'=>Carbon::create('2024', '11', '30'),
            'invitados'=>200,
            'color'=>'#0000ff',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        Evento::create([
            'cliente_id'=>'4',
            'user_id'=>'1',
            'title'=>'Social',
            'subTitle'=>'Boda',
            'start'=>Carbon::create('2024', '09', '20'),
            'end'=>Carbon::create('2024', '09', '21'),
            'invitados'=>300,
            'color'=>'#0000ff',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

    }
}
