<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'user_id' => 1,
          'introduction' => $this->faker->realText(100),
          'name' => 'hoge',
          'price' => 100,
          'adress' => 'hoge',
          'image' => 'hoge',
        ]; 
    }
}
