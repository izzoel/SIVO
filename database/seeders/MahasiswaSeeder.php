<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate random names and insert data into the database
        for ($i = 0; $i < 800; $i++) { // Generate 10 random names, you can adjust as needed
            Mahasiswa::create([
                'nama' => $faker->name,
            ]);
        }
    }
}
