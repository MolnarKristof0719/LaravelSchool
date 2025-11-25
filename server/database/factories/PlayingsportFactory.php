<?php

namespace Database\Factories;

use App\Models\Sport;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playingsport>
 */
class PlayingsportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomStudentId = Student::inRandomOrder()->first()->id;
        $randomSportsId = Sport::inRandomOrder()->first()->id;

        return [
            'studentId' => $randomStudentId,
            'sportId' => $randomSportsId,

        ];
    }
}
