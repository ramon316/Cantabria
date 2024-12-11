<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class clienteFactory extends Factory
{

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
            'user_id'   =>  User::factory(),

        ];
    }
}
