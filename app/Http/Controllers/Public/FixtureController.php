<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Fixture;

class FixtureController extends Controller
{
    public function index()
    {
        $upcoming = Fixture::with('competition')
            ->whereIn('status', ['Upcoming', 'Postponed'])
            ->orderBy('match_date')
            ->get();

        $results = Fixture::with('competition')
            ->where('status', 'Completed')
            ->orderByDesc('match_date')
            ->get();

        return view('public.fixtures', compact('upcoming', 'results'));
    }

    public function show(Fixture $fixture)
    {
        return view('public.fixture-detail', compact('fixture'));
    }
}
