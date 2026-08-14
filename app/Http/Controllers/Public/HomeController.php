<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\NewsArticle;
use App\Models\Player;
use App\Models\GalleryImage;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingFixture = Fixture::where('status', 'Upcoming')
            ->orderBy('match_date')
            ->first();

        $latestResult = Fixture::where('status', 'Completed')
            ->orderByDesc('match_date')
            ->first();

        $latestNews = NewsArticle::where('is_published', true)
            ->with('category')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $featuredPlayers = Player::where('is_featured', true)
            ->where('is_active', true)
            ->take(6)
            ->get();

        $recentPhotos = GalleryImage::with('album')
            ->whereHas('album', fn ($q) => $q->where('is_published', true))
            ->latest()
            ->take(8)
            ->get();

        return view('public.home', compact(
            'upcomingFixture', 'latestResult', 'latestNews', 'featuredPlayers', 'recentPhotos'
        ));
    }
}
