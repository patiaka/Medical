<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'staffId' => \uniqid(),
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'birthDate' => fake()->date(),
            'jobTitle' => fake()->jobTitle(),
            'company' => fake()->randomElement(['SOMISY', 'CORICA', 'SFTP', 'Aggreko', 'SNIAF']),
            'employeeType' => fake()->randomElement(['Expat', 'National']),
            'department_id' => \rand(1, 10),
        ];
    }
}
