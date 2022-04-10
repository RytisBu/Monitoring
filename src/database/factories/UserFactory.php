<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name = $this->faker->firstName;
        $last_name  = $this->faker->lastName;

        return [
            'name' => $first_name . ' ' . $last_name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make($first_name),
            'remember_token' => Str::random(10),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'created_at' => now(),
            'updated_at' => now(),
            'language' => $this->faker->randomElement(['EN', 'LT', '']),
            'timezone' => '+2',
            'is_admin' => $this->faker->randomElement(['0', '1']),
            'address_street' => $this->faker->words(1, TRUE),
            'address_state' => $this->faker->words(1, TRUE),
            'address_country' => $this->faker->words(1, TRUE),
            'address_city' => $this->faker->words(1, TRUE),
            'phone_mobile' => $this->faker->numerify('########'),
            'work_mobile' => $this->faker->numerify('########'),
            'deleted' => '0',
        ];
    }
}
