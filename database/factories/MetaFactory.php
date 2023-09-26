<?php

namespace Database\Factories;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetaFactory extends Factory
{
    protected $model = Meta::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(60),
            'description' => $this->faker->text(160),
        ];
    }
}
