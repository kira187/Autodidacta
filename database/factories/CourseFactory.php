<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
Use Illuminate\Support\Str;
use App\Models\User;
use App\Models\level;
use App\Models\Category;
use App\Models\Price;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug' => Str::slug($title),
            'user_id' => User::all()->random()->id,
            'level_id' => level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id,
        ];
    }
}
