<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected function withFaker()
    {
        // Manuális beállítás az app config felülírására
        return \Faker\Factory::create('hu_HU');
    }
    function kalkulalOsztöndijTömbbel(float $atlag): int
    {
        $osztondijTabla = [
            2.0 => 8000,
            2.5 => 16000,
            3.5 => 25000,
            4.5 => 42000,
            // Az 59000-et a ciklus utáni alapértelmezett érték garantálja.
        ];

        foreach ($osztondijTabla as $hatar => $osszeg) {
            if ($atlag < $hatar) {
                return $osszeg;
            }
        }
        return 59000;
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //neme
        $sex = $this->faker->boolean;
        //neve
        $gender = $sex ? "male" : "female";
        $firstName = $this->faker->firstName($gender);
        $lastName = $this->faker->lastName();
        $studentName = "$lastName $firstName";

        //iranyitoszam
        $postalCode = $this->faker->postcode();

        //hely
        $city = $this->faker->city();
        $address = $this->faker->streetAddress();

        //randomclass
        $randomClass = Schoolclass::InRandomOrder()->first();
        $schoolclassId = $randomClass->id;
        // birth data
        $birthPlace = $this->faker->city();

        $grade = substr($randomClass->className, 0);
        $ageMin = $grade + 5;
        $ageMax = $grade + 6;
        $birthDate = $this->faker->dateTimeBetween('-' . ($ageMax) . ' years', '-' . $ageMin . ' years');

        // personal ID
        $idNumber = strtoupper($this->faker->bothify("??######"));




        // GPA / scholarship
        $gpa = $this->faker->randomFloat(2, 1, 5); // 1.00 – 5.00

        $scholarship = $this->kalkulalOsztöndijTömbbel($gpa);

        return [
            'studentName' => $studentName,
            'schoolclassId' => $schoolclassId,
            'sex' => $sex,
            'postalCode' => $postalCode,
            'city' => $city,
            'address' => $address,
            'birthPlace' => $birthPlace,
            'birthDate' => $birthDate,
            'idNumber' => $idNumber,
            'gpa' => $gpa,
            'scholarship' => $scholarship,
        ];
    }
}
