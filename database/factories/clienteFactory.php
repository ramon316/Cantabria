<?php

namespace Database\Factories;

use App\cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class clienteFactory extends Factory
{
    protected $model = cliente::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nombre' => $this->faker->name,
            'telefono' =>'614123456',
            'email' => $this->faker->unique()->safeEmail,
            'calle' =>$this->faker->sentence(1),
            'numero'    =>  $this->faker->buildingNumber,
            'colonia'   =>  $this->faker->streetName,
            'cp'    =>  $this->faker->postcode,
            'user_id' => '1'
        ];
    }
}
