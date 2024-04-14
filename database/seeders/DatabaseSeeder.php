<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Consultation;
use App\Models\Department;
use App\Models\Diagnosis;
use App\Models\Employee;
use App\Models\healthSurveillance;
use App\Models\Injury;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Oumar',
            'email' => 'ooureiba@somisy.com',
        ]);
        Department::factory(10)->create();
        Injury::factory(10)->create();
        Diagnosis::factory(10)->create();
        Employee::factory(10)->create();
        Consultation::factory(20)->create();
        healthSurveillance::factory(20)->create();
    }
}
