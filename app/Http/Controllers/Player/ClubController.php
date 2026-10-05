<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $player = auth()->user()->player;

        $representations = $player->playerRepresentation()->with('club')->get();

        return view('my-profile.clubs.index', compact('player','representations'));
    }
}
