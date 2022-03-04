<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Extra\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            [
                'value' => 'male',
                'slug' => 'm'
            ],
            [
                'value' => 'female',
                'slug' => 'f'
            ]
        ];

        foreach ($genders as $gender) {
            Gender::create($gender);
        }
    }
}
