<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activebattle;
use App\Character;
use App\Derivedstats;
use App\Mapdata;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BattlemapController extends Controller
{
    public function index()
    {
        // Reset Activebattle data
        Activebattle::truncate();

        // Load test map
        $map = Mapdata::find(1);

        // Load map dimensions
        $grid_columns = $map->number_cols;
        $grid_rows = $map->number_rows;

        // Load enemies
        foreach($map->enemy_data as $enemy)
        {
            $character = Character::with('derivedstats')->find($enemy['character_id']);
            Activebattle::create([
                'character_id' => $enemy['character_id'],
                'last_x' => $enemy['x_loc'],
                'last_y' => $enemy['y_loc'],
                'turn_number' => 1, // Perhaps add a max turn number to mapdata?
                'current_hp' => $character->derivedstats->max_hp,
                'has_moved' => false
            ]);
        }

        // Load allies
        foreach($map->ally_data as $ally)
        {
            $character = Character::with('derivedstats')->find($ally['character_id']);
            Activebattle::create([
                'character_id' => $ally['character_id'],
                'last_x' => $ally['x_loc'],
                'last_y' => $ally['y_loc'],
                'turn_number' => 1, // Perhaps add a max turn number to mapdata?
                'current_hp' => $character->derivedstats->max_hp,
                'has_moved' => false
            ]);
        }

        // Prepare mapdata from Activebattle
        $map_data = [];
        $all_participants = Activebattle::all();
        foreach($all_participants as $participant)
        {
            $tempObject = [
                'startLocation' => ['x' => $participant->last_x, 'y' => $participant->last_y],
                'character' => Character::with('statistics', 'derivedstats', 'equipmentslots')->find($participant->character_id),
                'has_moved' => 0, 
                'turn_number' => 1
            ];

            array_push($map_data, $tempObject);
        }

        $character_names = Character::lists('name', 'id')->toArray();

        return view('battlemap.index', compact('character_names', 'map_data', 'grid_columns', 'grid_rows'));
    }

    /**
    * @return 1 on valid moves, mapdata for redraw on invalid moves
    */
    public function validateMove(Request $request)
    {
        $participant = Activebattle::where('character_id', $request->get('character_id'))->first();
        
        if ($request->get('turn_number') == $participant->turn_number)
        {
            if (!$participant->has_moved)
            {
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
                        'last_y' => $move_to_y,
                        'has_moved' => true
                    ]);

                    // Check for remaining moves
                    $participantsWithMoves = Activebattle::where('has_moved', 0)->get();

                    if(count($participantsWithMoves) == 0) 
                    {
                        $this->advanceTurn();
                    } 

                    return 1;
                }
            }
        }
    }

    /**
    * @return 1 on valid actions, mapdata for redraw on invalid actions
    */
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
                return 1;
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
                'character' => Character::with('statistics', 'derivedstats', 'equipmentslots')->find($participant->character_id), 
                'has_moved' => $participant->has_moved, 
                'turn_number' => $participant->turn_number
            ];

            array_push($map_data, $tempObject);
        }

        return $map_data;
    }

    protected function advanceTurn()
    {
        $participants = Activebattle::all();
        $turn_number = $participants[0]->turn_number; // Ugh
        $turn_number++;

        foreach ($participants as $participant)
        {
            $participant->update(['has_moved' => false, 'turn_number' => $turn_number]);
        }
    }
}
