<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  =>  $this->faker->name,
            'color' =>  '#cb3414',
            'email' =>  $this->faker->email,
            'password'  =>  $this->faker->password,
            'created_at'    =>  $this->faker->dateTime,
            'updated_at'    =>  $this->faker->dateTime,
        ];
    }
}
