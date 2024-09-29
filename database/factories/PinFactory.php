<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pin>
 */
class PinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(7, 15),
            'title' => fake()->realText(20),
            'description' => fake()->realTextBetween(50, 100),
            'image' => Arr::random([
                '1726297236_3tkWhiewkGXCjAwwvloA3QDQG6SI3jQ6OlHEpfEn.jpg',
                '1726297214_BM2GMIjlFoqmNBCOOPPIIzKCBTrO33ZIKCVwy1Fc.jpg',
                '1726297256_1Wac2BtSQxJqj1TltA2yYKRzLL7qMIfTtsOyEYhT.jpg',
                '1726236382_JEHRWRMy9i6CCSmsRiRhLEt7UsKnZxmg3tGzlCXI.jpg',
                '1726238974_a760BWFX0dkaFU8oOMWGB8sJrZf1qQ15vh9mBo5q.jpg',
                '1726297227_yUe2mRM5u8EnfljzJTULWUkRNO03AKMy9NPiO8Fk.png'
            ]),
        ];
    }
}
