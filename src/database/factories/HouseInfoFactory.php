<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class HouseInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $locations = ['theran', 'esphahan', 'shiraz', 'golestan', 'khozestan', 'tabriz'];
        return [
            'location' => Arr::random($locations),
            'price' => rand(1000, 100000),
            'meter' => rand(50, 200),
            'photo' => rand(0, 1),
        ];
    }
}
