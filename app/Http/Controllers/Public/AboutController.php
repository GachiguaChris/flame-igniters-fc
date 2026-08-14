<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Coach;

class AboutController extends Controller
{
    public function index()
    {
        $coaches = Coach::where('is_active', true)->get();
        return view('public.about', compact('coaches'));
    }
}
