<?php

namespace Database\Seeders;

use App\Models\HouseInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HouseInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HouseInfo::factory()->count(30)->create();
    }
}
