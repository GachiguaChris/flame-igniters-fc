<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'site_name'       => 'Flame Igniters FC',
            'tagline'         => 'Igniting Passion. Building Character. Uniting Community.',
            'about_short'     => 'A football club proudly operating under Life Renewal Center Kamirithu Church, Kenya.',
            'contact_email'   => 'info@flameignitersfc.com',
            'contact_phone'   => '+254 700 000 000',
            'contact_address' => 'Kamirithu, Kiambu County, Kenya',
            'google_maps_url' => '',
            'facebook_url'    => '',
            'instagram_url'   => '',
            'twitter_url'     => '',
            'youtube_url'     => '',
            'church_website'  => '',
        ];

        foreach ($defaults as $key => $value) {
            SiteSetting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
