<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::orderByDesc('year')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('type');

        return view('public.achievements', compact('achievements'));
    }
}
