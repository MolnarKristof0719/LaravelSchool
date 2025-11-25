<?php

namespace Database\Seeders;

use App\Helpers\CsvReader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schoolclass;

class SchoolclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = 'csv/schoolclasses.csv';
        $delimiter = ';';

        $data = CsvReader::csvToArray($fileName, $delimiter);
        Schoolclass::factory()->createMany($data);
    }
}
