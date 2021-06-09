<?php

namespace Database\Factories;

use App\Models\MobileNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class MobileNumberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MobileNumber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->phoneNumber
        ];
    }
}
