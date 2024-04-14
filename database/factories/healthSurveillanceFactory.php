<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\healthSurveillance>
 */
class healthSurveillanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'surveillanceType' => \fake()->randomElement(['preEmployment', 'postEmployment', 'annualMedical', 'periodicMedical']),
            'hazards' => \fake()->sentence(),
            'ecg' => \fake()->randomElement(['Abnormal', 'Normal']),
            'spirometry' => \fake()->randomElement(['Abnormal', 'Normal']),
            'audiometry' => \fake()->randomElement(['Abnormal', 'Normal']),
            'general' => \fake()->sentence(),
            'followUp' => \fake()->date(),
            'employee_id' => \rand(1, 10),
        ];
    }
}
