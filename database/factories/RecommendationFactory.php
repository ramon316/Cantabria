<?php

namespace Database\Factories;

use App\recommendation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Recommendation>
 */
class RecommendationFactory extends Factory
{
    protected $model = recommendation::class; 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'  =>  $this->faker->name,
            'comment'   =>  $this->faker->paragraph,
            'image'     =>  $this->faker->image('public/recommendations',640,480, null, false),
        ];
    }
}
