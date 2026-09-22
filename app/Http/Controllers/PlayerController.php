<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Models\Position;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public $playerStatus = [
        'ACTIVE'=>'success',
        'RETIRED'=>'info',
        'INJURED'=>'danger'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $players = Player::whereHas('playerPosition.positions', function ($query) use ($request) {
            $query->where('position_group', $request->group);
        })->get();

        $playerStatus = $this->playerStatus;

        return view('players.index', compact('players','playerStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all();

        return view('players.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        $playerStatus = $this->playerStatus;

        return view('players.show', compact('player','playerStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
