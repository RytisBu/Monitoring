<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;


class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complaint::factory()->times(15)
            ->hasSystem()
            ->create();
    }
}
