<?php

namespace Database\Seeders;

use App\Models\Fixture;
use App\Models\Competition;
use Illuminate\Database\Seeder;

// NOTE: All opponent names and scores below are fictional demo data for development purposes only.
class FixtureSeeder extends Seeder
{
    public function run(): void
    {
        $league  = Competition::where('name', 'Kamirithu Community League')->first();
        $cup     = Competition::where('name', 'Church Cup')->first();
        $friendly = Competition::where('name', 'Friendly Match')->first();

        $fixtures = [
            // Completed
            ['competition_id' => $league?->id,   'opponent' => 'Demo FC Alpha',   'match_date' => now()->subDays(30), 'home_away' => 'Home', 'status' => 'Completed', 'our_score' => 3, 'opponent_score' => 1, 'match_report' => 'A dominant home performance. Demo match report — replace with actual content.'],
            ['competition_id' => $league?->id,   'opponent' => 'Demo FC Beta',    'match_date' => now()->subDays(23), 'home_away' => 'Away', 'status' => 'Completed', 'our_score' => 1, 'opponent_score' => 1, 'match_report' => 'A hard-fought draw away from home. Demo match report.'],
            ['competition_id' => $cup?->id,      'opponent' => 'Demo FC Gamma',   'match_date' => now()->subDays(16), 'home_away' => 'Home', 'status' => 'Completed', 'our_score' => 2, 'opponent_score' => 0, 'match_report' => 'Clean sheet victory in the cup. Demo match report.'],
            ['competition_id' => $friendly?->id, 'opponent' => 'Demo FC Delta',   'match_date' => now()->subDays(9),  'home_away' => 'Away', 'status' => 'Completed', 'our_score' => 0, 'opponent_score' => 2, 'match_report' => 'Tough defeat in a friendly. Demo match report.'],
            // Upcoming
            ['competition_id' => $league?->id,   'opponent' => 'Demo FC Epsilon', 'match_date' => now()->addDays(7),  'kickoff_time' => '15:00', 'venue' => 'Kamirithu Ground', 'home_away' => 'Home', 'status' => 'Upcoming'],
            ['competition_id' => $cup?->id,      'opponent' => 'Demo FC Zeta',    'match_date' => now()->addDays(14), 'kickoff_time' => '14:00', 'venue' => 'Away Ground',      'home_away' => 'Away', 'status' => 'Upcoming'],
            ['competition_id' => $league?->id,   'opponent' => 'Demo FC Eta',     'match_date' => now()->addDays(21), 'kickoff_time' => '16:00', 'venue' => 'Kamirithu Ground', 'home_away' => 'Home', 'status' => 'Upcoming'],
        ];

        foreach ($fixtures as $fixture) {
            Fixture::create($fixture);
        }
    }
}
