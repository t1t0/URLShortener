<?php

namespace Database\Factories;

use App\Models\Shortlink;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShortlinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shortlink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(8),
            'url' => $this->faker->url(),
            'visits' => $this->faker->randomNumber(2, true),
            'nsfw' => $this->faker->boolean()
        ];
    }
}
