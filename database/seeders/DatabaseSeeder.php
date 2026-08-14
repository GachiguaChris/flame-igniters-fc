<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SiteSettingSeeder::class,
            CompetitionSeeder::class,
            NewsCategorySeeder::class,
            PlayerSeeder::class,
            CoachSeeder::class,
            FixtureSeeder::class,
            NewsArticleSeeder::class,
            AchievementSeeder::class,
        ]);
    }
}
