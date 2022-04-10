<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        System::factory()->times(15)
//            ->hasSystem()
            ->create();
    }
}
