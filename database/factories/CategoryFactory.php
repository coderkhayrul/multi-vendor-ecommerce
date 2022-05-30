<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->name(),
            'category_slug' => Str::slug($this->faker->name()),
            'category_description' => $this->faker->text,
            'category_image' => $this->faker->imageUrl('http://lorempixel.com/120/120/'),
            'category_status' => 1,
        ];
    }
}
