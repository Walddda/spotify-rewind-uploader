<?php

namespace Database\Factories;

use App\Models\Beat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'path' => Str::random(5) . '.mp3',
            'tag1' => '#' . Str::random(5),
            'tag2' => '#' . Str::random(5),
            'description' => Str::random(20),
            'user_id' => 1,
            //
        ];
    }
}
