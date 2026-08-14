<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

// NOTE: All achievements below are fictional demo data for development purposes only.
class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            ['title' => 'Demo Community League Champions', 'year' => 2023, 'type' => 'Trophy',     'description' => 'Demo achievement — replace with actual information.', 'sort_order' => 1],
            ['title' => 'Demo Church Cup Winners',         'year' => 2023, 'type' => 'Trophy',     'description' => 'Demo achievement — replace with actual information.', 'sort_order' => 2],
            ['title' => 'Demo Tournament Runners-Up',      'year' => 2022, 'type' => 'Tournament', 'description' => 'Demo achievement — replace with actual information.', 'sort_order' => 1],
            ['title' => 'Demo Fair Play Award',            'year' => 2023, 'type' => 'Award',      'description' => 'Demo achievement — replace with actual information.', 'sort_order' => 1],
            ['title' => 'Club Founded',                    'year' => 2020, 'type' => 'Milestone',  'description' => 'Flame Igniters FC was established under Life Renewal Center Kamirithu Church.', 'sort_order' => 1],
        ];

        foreach ($achievements as $achievement) {
            Achievement::firstOrCreate(['title' => $achievement['title']], $achievement);
        }
    }
}
