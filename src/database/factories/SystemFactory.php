<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\System;


class SystemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = System::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users  = User::inRandomOrder()->take(1)->pluck('id');

        return [
            'name' => 'www.' . $this->faker->words(1, TRUE) . '.' . $this->faker->randomElement(['lt', 'en', 'com', 'ru', 'org']),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $users->first(),
            'updated_by' => $users->first(),
            'assigned_user_id' => $users->first(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'deleted' => '0',
            'description' => $this->faker->text(255),
        ];
    }
}
