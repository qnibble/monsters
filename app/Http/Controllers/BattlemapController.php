<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activebattle;
use App\Character;
use App\Derivedstats;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BattlemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Reset Activebattle data
        Activebattle::truncate();

        // For now we will make all characters participants:
        // In the future: participants, starting locations, map size and terrain information should all be derived from mapdata table
        $all_characters = Character::with('derivedstats')->get();
        foreach ($all_characters as $character) {
            Activebattle::create([
                'character_id' => $character->id,
                'last_x' => $character->id * 2,
                'last_y' => $character->id + 5,
                'current_hp' => $character->derivedstats->max_hp
            ]);
        }

        $map_data = [];

        for ($index = 1; $index <= 2; $index ++) { 
            $tempObject = [
                'startLocation' => ['x' => $index * 2, 'y' => $index + 5],
                'character' => Character::with('statistics', 'derivedstats', 'equipmentslots')->find($index)
            ];

            array_push($map_data, $tempObject);
        }

        $character_names = Character::lists('name', 'id')->toArray();

        return view('battlemap.index', compact('character_names', 'map_data'));
    }

    public function validateMove(Request $request)
    {
        $participant = Activebattle::where('character_id', $request->get('character_id'))->first();
        $character_speed = Derivedstats::find($request->get('character_id'))->speed;

        $move_from_x = $request->get('x_old');
        $move_from_y = $request->get('y_old');
        $move_to_x = $request->get('x_new');
        $move_to_y = $request->get('y_new');

        $distance = abs($move_from_x - $move_to_x) + abs($move_from_y - $move_to_y);

        if ($distance > $character_speed) 
        {
            // Invalid move; Return Mapdata and Redraw board state
            return $this->getLastKnownGoodMapValues();
        }
        else 
        {
            $participant->update([
                'last_x' => $move_to_x,
                'last_y' => $move_to_y
            ]);

            return 'Valid Move';
        }
    }

    public function validateAction(Request $request)
    {
        $attacker = Character::with('equipmentslots')->find($request->get('attacker_id'));
        $defender = Character::with('equipmentslots')->find($request->get('defender_id'));

        $distance = abs($request->get('attacker_pos_x') - $request->get('defender_pos_x')) + abs($request->get('attacker_pos_y') - $request->get('defender_pos_y'));

        if ($request->get('type') == 'weapon')
        {
            $weaponRange = $attacker->equipmentslots->weapon->range;
            // return $attacker->name . ' is attacking ' . $defender->name . ' with a ' . $attacker->equipmentslots->weapon->name . ' (Range: '.$weaponRange.')';

            if ($weaponRange >= $distance)
            {
                return 'Valid';
            }
            else
            {
                // Invalid attack; Return Mapdata and Redraw board state
                return $this->getLastKnownGoodMapValues();
            }
        }
        elseif ($request->get('type') == 'ability') 
        {

        }
    }

    // Will not as of yet respect anything other than characters' locations (Ex: turn number, hasMoved status, etc)
    protected function getLastKnownGoodMapValues()
    {
        $participants = Activebattle::all();

        $map_data = [];
        foreach ($participants as $participant)
        {
            $tempObject = [
                'startLocation' => ['x' => $participant->last_x, 'y' => $participant->last_y],
                'character' => Character::with('statistics', 'derivedstats', 'equipmentslots')->find($participant->character_id)
            ];

            array_push($map_data, $tempObject);
        }

        return $map_data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
