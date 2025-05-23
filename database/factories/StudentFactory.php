<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Student::class;

    public function definition(): array
    {
        $gender = $this->faker->randomElement(['Male', 'Female']);

        return [
            'registration_no' => 'REG2025' . $this->faker->unique()->numberBetween(1000, 9999),
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'date_of_birth' => $this->faker->date('Y-m-d', '-18 years'), // at least 18 years old
            'gender' => $gender,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
