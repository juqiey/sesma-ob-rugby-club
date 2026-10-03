<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Models\Position;
use App\Services\PlayerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public $playerStatus = [
        'ACTIVE'=>'success',
        'RETIRED'=>'info',
        'INJURED'=>'danger'
    ];

    public function __construct(private PlayerService $playerService)
    {

    }

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
    public function store(Request $request)
    {

        $validated = $request->validate([
            'profile_photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'full_name'=>'required|string|max:255',
            'preferred_name'=>'nullable|string|max:255',
            'date_of_birth'=>'nullable|date',
            'gender'=>'nullable|in:male,female,other',
            'phone_number'=>'nullable|string|max:20',
            'batch'=>'nullable|string|max:255',
            'height_cm'=>'nullable|numeric',
            'weight_kg'=>'nullable|numeric',
            'muscle_mass_kg'=>'nullable|numeric',
            'body_fat_percentage'=>'nullable|numeric',
            'position_ids'=>'required|array',
            'position_ids.*'=>'required|integer|exists:positions,id',
            'playing_status'=>'required|in:ACTIVE,RETIRED,INJURED',
            'email'=>'nullable|email|max:255',
        ]);


        DB::beginTransaction();

        try{
            //Upload profile photo if provided
            if($request->hasFile('profile_photo')){
                $file = $request->file('profile_photo');
                $originalName = preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $fileName = date('YmdHis') . '_profile_'. $originalName;
                $destination = public_path('/uploads/players/profile_photos');

                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }

                $file->move($destination, $fileName);

                $validated['profile_photo'] = '/uploads/players/profile_photos/' . $fileName;
            }

            //Calculate age if date_of_birth is provided
            if(isset($validated['date_of_birth'])){
                $dob = \Carbon\Carbon::parse($validated['date_of_birth']);
                $age = $dob->age;
                $validated['age'] = $age;
            } else {
                $validated['age'] = null;
            }

            //Generate player code
            $playerCode = $this->playerService->createPlayerCode($validated['batch'] ?? 'default');
            $validated['player_code'] = $playerCode;

            //Create new player
            $player = Player::create([
                'name'=>$validated['full_name'],
                'nickname'=>$validated['preferred_name'] ?? null,
                'date_of_birth'=>$validated['date_of_birth'] ?? null,
                'gender'=>$validated['gender'] ?? null,
                'batch'=>$validated['batch'] ?? null,
                'profile_url'=>$validated['profile_photo'] ?? null,
                'status'=>$validated['playing_status'],
                'email'=>$validated['email'] ?? null,
                'player_code'=>$validated['player_code'],
                'age'=>$validated['age'],
                'phone_number'=>$validated['phone_number'] ?? null
            ]);

            foreach($validated['position_ids'] as $positionId){
                $player->playerPosition()->create([
                    'position_id'=>$positionId,
                    'remark'=>null
                ]);
            }

            //Create physical assessment record
            $player->physicalAssessment()->create([
                'weight_kg'=>$validated['weight_kg'] ?? null,
                'height_cm'=>$validated['height_cm'] ?? null,
                'muscle_mass_kg'=>$validated['muscle_mass_kg'] ?? null,
                'body_fat_percentage'=>$validated['body_fat_percentage'] ?? null,
            ]);

            $latestPlayerPosition = $player->playerPosition()->latest()->first();

            $group = $latestPlayerPosition->positions->position_group;

            DB::commit();

            return redirect()->route('players.index', ['group'=>$group])->with('success', 'Player created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Failed to create player: ' . $e->getMessage()], 500);
        }

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
