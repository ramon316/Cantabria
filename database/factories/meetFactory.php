<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\meet>
 */
class meetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cliente_id' => $this->faker->numberBetween(1,4),
            'user_id' => $this->faker->numberBetween(1,3),
            'title' => $this->faker->jobTitle(),
            'reason_id' => $this->faker->numberBetween(1,11),
            'start' => $this->faker->dateTimeInInterval($date='', $interval='10 days'),
            'contrato' => '1',
            'observacion' => $this->faker->sentence(),
        ];
    }
}
