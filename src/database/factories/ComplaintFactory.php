<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\System;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
//        $usersIds = User::get('id');
        $users  = User::inRandomOrder()->take(2)->pluck('id');
        $system = System::inRandomOrder()->take(1)->pluck('id');

        return [
            DB::table('complaints')->insert([
                'id' => $this->faker->unique()->numberBetween(1, 20),//rand(100, 500),
//                'name' => $this->faker->name,
//                'id' => 1,
                'name' => 'testas',
//                'created_at' => now(),
//                'updated_at' => now(),
                'created_by_user' => 1,//$users->first(),
                'updated_by_user' => 1,//$users->first(),
                'category' => 'Other',
//                'category' => array_rand(['System not working', 'Need permissions', 'Found bug', 'API', 'Other']),
                'status' => 'Registered',
//                'status' => array_rand(['Registered', 'Solving', 'Resolved', 'Spam', 'Inform client']),
                'priority' => 'Normal',
//                'priority' => array_rand(['Normal', 'Critical', 'Low']),
                'assigned_user_id' => 1,//rand(1, 2),
                'system_id' => 16,
                'description' => 'Testas testauskas testukas',//$this->faker->text(255),
                'deleted' => 0,//rand(0, 1),
            ])
        ];
    }
}
