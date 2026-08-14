<?php

namespace Database\Seeders;

use App\Models\Coach;
use Illuminate\Database\Seeder;

// NOTE: All names below are fictional demo data for development purposes only.
class CoachSeeder extends Seeder
{
    public function run(): void
    {
        $coaches = [
            ['name' => 'Demo Head Coach',      'role' => 'Head Coach',        'bio' => 'Demo head coach biography. Replace with actual information.'],
            ['name' => 'Demo Assistant Coach', 'role' => 'Assistant Coach',   'bio' => 'Demo assistant coach biography. Replace with actual information.'],
            ['name' => 'Demo Goalkeeper Coach','role' => 'Goalkeeper Coach',  'bio' => 'Demo goalkeeper coach biography. Replace with actual information.'],
            ['name' => 'Demo Team Manager',    'role' => 'Team Manager',      'bio' => 'Demo team manager biography. Replace with actual information.'],
        ];

        foreach ($coaches as $coach) {
            Coach::firstOrCreate(['name' => $coach['name']], array_merge($coach, ['is_active' => true]));
        }
    }
}
