<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

// NOTE: All article content below is fictional demo data for development purposes only.
class NewsArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin    = User::where('role', 'admin')->first();
        $matchCat = NewsCategory::where('slug', 'match-report')->first();
        $teamCat  = NewsCategory::where('slug', 'team-news')->first();
        $commCat  = NewsCategory::where('slug', 'community')->first();

        $articles = [
            [
                'title'            => 'Demo Match Report: Flame Igniters FC 3-1 Demo FC Alpha',
                'news_category_id' => $matchCat?->id,
                'excerpt'          => 'A dominant home performance saw Flame Igniters FC claim all three points in a thrilling encounter.',
                'content'          => '<p>This is a demo match report. Replace with actual match content.</p><p>Flame Igniters FC put in a commanding display at Kamirithu Ground, running out comfortable 3-1 winners against Demo FC Alpha.</p><p>Goals from our forwards and a solid defensive display made this a memorable afternoon for the team and supporters.</p>',
                'is_published'     => true,
                'published_at'     => now()->subDays(29),
            ],
            [
                'title'            => 'New Training Schedule Announced for the Season',
                'news_category_id' => $teamCat?->id,
                'excerpt'          => 'The coaching staff has released the updated training schedule for the remainder of the season.',
                'content'          => '<p>This is a demo team news article. Replace with actual content.</p><p>The head coach has announced updated training times to help the squad prepare for the busy fixture schedule ahead.</p>',
                'is_published'     => true,
                'published_at'     => now()->subDays(20),
            ],
            [
                'title'            => 'Flame Igniters FC Participates in Community Outreach',
                'news_category_id' => $commCat?->id,
                'excerpt'          => 'Players and staff joined the Life Renewal Center Kamirithu Church community outreach programme.',
                'content'          => '<p>This is a demo community article. Replace with actual content.</p><p>Members of Flame Igniters FC joined the church community outreach, demonstrating that our commitment extends beyond the football pitch.</p>',
                'is_published'     => true,
                'published_at'     => now()->subDays(10),
            ],
        ];

        foreach ($articles as $article) {
            NewsArticle::firstOrCreate(
                ['slug' => Str::slug($article['title'])],
                array_merge($article, ['user_id' => $admin?->id, 'slug' => Str::slug($article['title'])])
            );
        }
    }
}
