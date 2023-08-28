<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->words();
        return [
            'name' => $name,
            'description' => $this->faker->text(),
            'slug' => Str::slug($name),
            'is_visible' => $this->faker->boolean(),
        ];
    }
}
