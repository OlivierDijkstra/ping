<?php

namespace Database\Factories;

use App\Models\Ping;
use Illuminate\Database\Eloquent\Factories\Factory;

class PingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ping::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'latency' => $this->faker->randomFloat(),
            'status' => $this->faker->httpStatusCode(),
        ];
    }
}
