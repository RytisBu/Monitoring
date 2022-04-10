<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\System;
use App\Models\Complaint;

class ComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users  = User::inRandomOrder()->take(1)->pluck('id');
        $system = System::inRandomOrder()->take(1)->pluck('id');

        return [
            'name' => $this->faker->words(3, TRUE),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by_user' => $users->first(),
            'updated_by_user' => $users->first(),
            'category' => $this->faker->randomElement(['System not working', 'Need permissions', 'Found bug', 'API', 'Other']),
            'status' => $this->faker->randomElement(['Registered', 'Solving', 'Resolved', 'Spam', 'Inform client']),
            'priority' => $this->faker->randomElement(['Normal', 'Critical', 'Low']),
            'assigned_user_id' => $users->first(),
            'system_id' => $system->first(),
            'description' => $this->faker->text(255),
            'deleted' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
