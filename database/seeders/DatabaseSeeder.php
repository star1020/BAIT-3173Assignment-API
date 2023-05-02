<?php

namespace Database\Seeders;

use App\Models\Card_info;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Card_info::factory(100)->create();
    }
}
