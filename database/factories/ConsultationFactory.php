<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 5), // Example: Random user ID between 1 and 100
            'employee_id' => fake()->numberBetween(1, 5), // Example: Random employee ID between 1 and 100
            'injurie_id' => fake()->numberBetween(1, 5), // Example: Random injury ID between 1 and 100
            'staffType' => fake()->randomElement(['Staff', 'Family']), // Example: Random word for staffType
            'referral' => fake()->sentence(), // Example: Random sentence for referral
            'diagnosis' => fake()->sentence(), // Example: Random sentence for diagnosis
            'history' => fake()->paragraph(), // Example: Random paragraph for history
            'bp' => fake()->sentence(1), // Example: Random word for bp
            'pulse' => fake()->numberBetween(60, 100), // Example: Random number between 60 and 100 for pulse
            'temperature' => fake()->numberBetween(36, 38), // Example: Random number between 36 and 38 for temperature
            'observation' => fake()->paragraph(), // Example: Random paragraph for observation
            'comments' => fake()->paragraph(), // Example: Random paragraph for comments
            'malaria' => fake()->sentence(1), // Example: Random word for malaria
            'daysOff' => fake()->numberBetween(1, 10), // Example: Random number between 1 and 10 for daysOff
            'diagnosispec' => fake()->paragraph(), // Example: Random paragraph for diagnosispec
            'diagnosiMali' => fake()->paragraph(), // Example: Random paragraph for diagnosiMali
        ];
    }
}
