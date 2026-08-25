<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $positionGroups = [
        'Forward'=>'info',
        'Backs'=>'success'
    ];

    public function index($format)
    {
        $positions = Position::where('format',$format)->get();

        $positionGroups = $this->positionGroups;

        return view('positions.index', compact('positions','positionGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        $positionGroups = $this->positionGroups;

        return view('positions.show', compact('position','positionGroups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }
}
