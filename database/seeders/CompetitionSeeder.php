<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        $competitions = [
            ['name' => 'Kamirithu Community League', 'season' => '2024'],
            ['name' => 'Church Cup', 'season' => '2024'],
            ['name' => 'Kiambu County Tournament', 'season' => '2024'],
            ['name' => 'Friendly Match', 'season' => null],
        ];

        foreach ($competitions as $comp) {
            Competition::firstOrCreate(['name' => $comp['name']], $comp);
        }
    }
}
