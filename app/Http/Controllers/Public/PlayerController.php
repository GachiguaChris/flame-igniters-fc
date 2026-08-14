<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::where('is_active', true)
            ->orderBy('position')
            ->orderBy('jersey_number')
            ->get()
            ->groupBy('position');

        return view('public.players', compact('players'));
    }
}
