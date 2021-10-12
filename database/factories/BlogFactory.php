<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => mt_rand(1,3),
            'categori_id'   => mt_rand(1,4), 
            'judul'         => $this->faker->sentence(mt_rand(1,3)),
            'content'       => $this->faker->paragraph(mt_rand(5,10)),
            'slug'          => $this->faker->slug(),
        ];
    }
}
