<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Position;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $player = auth()->user()->player;

        $representations = $player->playerRepresentation()->with('club')->get();

        return view('my-profile.clubs.index', compact('player','representations'));
    }

    public function create()
    {
        $positions = Position::orderBy('id')->get();

        return view('my-profile.clubs.create', compact('positions'));
    }

    public function search(Request $request)
    {
        $search = trim($request->input('q'));

        if (strlen($search) < 2) {
            return response()->json([]);
        }

        $clubs = Club::query()
            ->where(function ($query) use ($search) {

                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%");

            })
            ->orderBy('name')
            ->limit(10)
            ->get([
                'id',
                'name',
                'type',
                'location',
                'logo'
            ]);

        return response()->json($clubs);
    }
}
