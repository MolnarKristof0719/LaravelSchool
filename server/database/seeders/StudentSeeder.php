<?php

namespace Database\Seeders;

use App\Models\Schoolclass;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Egy oszalyba atlag 28 jár
        $avgClassSize = 28;

        //Összesen hany osztalyunk van
        $numberOfClasses = Schoolclass::count();

        $numberOfStudent = $avgClassSize * $numberOfClasses;
        Student::factory()->count($numberOfStudent)->create();

        
    }
}
