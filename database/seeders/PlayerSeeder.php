<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

// NOTE: All player names below are fictional demo data for development purposes only.
class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $players = [
            ['name' => 'Demo Goalkeeper One',   'jersey_number' => 1,  'position' => 'Goalkeeper', 'is_featured' => true,  'appearances' => 12, 'goals' => 0, 'assists' => 0],
            ['name' => 'Demo Goalkeeper Two',   'jersey_number' => 16, 'position' => 'Goalkeeper', 'is_featured' => false, 'appearances' => 4,  'goals' => 0, 'assists' => 0],
            ['name' => 'Demo Defender One',     'jersey_number' => 2,  'position' => 'Defender',   'is_featured' => true,  'appearances' => 14, 'goals' => 1, 'assists' => 2],
            ['name' => 'Demo Defender Two',     'jersey_number' => 5,  'position' => 'Defender',   'is_featured' => false, 'appearances' => 10, 'goals' => 0, 'assists' => 1],
            ['name' => 'Demo Defender Three',   'jersey_number' => 6,  'position' => 'Defender',   'is_featured' => false, 'appearances' => 13, 'goals' => 2, 'assists' => 0],
            ['name' => 'Demo Defender Four',    'jersey_number' => 3,  'position' => 'Defender',   'is_featured' => false, 'appearances' => 11, 'goals' => 0, 'assists' => 3],
            ['name' => 'Demo Midfielder One',   'jersey_number' => 8,  'position' => 'Midfielder', 'is_featured' => true,  'appearances' => 15, 'goals' => 4, 'assists' => 6],
            ['name' => 'Demo Midfielder Two',   'jersey_number' => 4,  'position' => 'Midfielder', 'is_featured' => true,  'appearances' => 14, 'goals' => 3, 'assists' => 5],
            ['name' => 'Demo Midfielder Three', 'jersey_number' => 7,  'position' => 'Midfielder', 'is_featured' => false, 'appearances' => 12, 'goals' => 2, 'assists' => 4],
            ['name' => 'Demo Midfielder Four',  'jersey_number' => 11, 'position' => 'Midfielder', 'is_featured' => false, 'appearances' => 9,  'goals' => 1, 'assists' => 2],
            ['name' => 'Demo Forward One',      'jersey_number' => 9,  'position' => 'Forward',    'is_featured' => true,  'appearances' => 15, 'goals' => 10, 'assists' => 3],
            ['name' => 'Demo Forward Two',      'jersey_number' => 10, 'position' => 'Forward',    'is_featured' => true,  'appearances' => 13, 'goals' => 7,  'assists' => 5],
            ['name' => 'Demo Forward Three',    'jersey_number' => 14, 'position' => 'Forward',    'is_featured' => false, 'appearances' => 8,  'goals' => 3,  'assists' => 1],
            ['name' => 'Demo Forward Four',     'jersey_number' => 17, 'position' => 'Forward',    'is_featured' => false, 'appearances' => 6,  'goals' => 2,  'assists' => 0],
        ];

        foreach ($players as $player) {
            Player::firstOrCreate(
                ['name' => $player['name']],
                array_merge($player, ['is_active' => true, 'bio' => 'Demo player biography. Replace with actual player information.'])
            );
        }
    }
}
