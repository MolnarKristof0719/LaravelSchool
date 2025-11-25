<?php

namespace Database\Seeders;

use App\Models\Playingsport;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayingsportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //a tanulok hany szazaleka sportol: 65%
        //egy tanulo atlagosan hanyat sportol: 1.1
        $percentageOfStudentsPlayingSports = 0.65;
        $averageNumberOfSportsAStudentPlays = 1.1;

        $numberOfStudent = Student::count();

        $numberOfAthletes = round($numberOfStudent *$percentageOfStudentsPlayingSports);
        $numberOfSports = round($numberOfAthletes * $averageNumberOfSportsAStudentPlays);
        Playingsport::factory()->count($numberOfSports)->create();
    }
}
