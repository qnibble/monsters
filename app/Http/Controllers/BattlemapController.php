<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activebattle;
use App\Character;
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

        // $render_test = '(2, 2)';
        // $render_array = ['(3, 5)', '(2, 1)'];
        // $render_array = [['x' => 5, 'y' => 2], ['x' => 3, 'y' => 1], ['x' => 7, 'y' => 7]];

        $map_data = [];

        for ($index = 1; $index <= 2; $index ++) { 
            $tempObject = [
                'startLocation' => ['x' => $index * 2, 'y' => $index + 5],
                'character' => Character::with('statistics', 'derivedstats', 'equipmentslots')->find($index)
            ];

            array_push($map_data, $tempObject);
        }

        // return $map_data;
        $character_names = Character::lists('name', 'id')->toArray();

        $test_character = Character::with('statistics')->find(1);
        $all_characters = Character::all();

        return view('battlemap.index', compact('character_names', 'test_character', 'all_characters', 'map_data'));
    }

    public function validateMove(Request $request)
    {
        // $participant_data = Activebattle::all();

        // $participant_data[$request->get('id')]
        $participant = Activebattle::where('character_id', $request->get('id'))->first();

        // If valid; update last known location
        $participant->update([
            'last_x' => $request->get('new_x'),
            'last_y' => $request->get('new_y')
        ]);
    }

    public function validateAction(Request $request)
    {
        $participant_data = Activebattle::all();

        if ($request->get('type') == 'weapon')
        {

        }
        elseif ($request->get('type') == 'ability') 
        {

        }

    }

    public function returnAjax(Request $request)
    {
        $testingObjectArray = [
            ['id' => 1, 'last_x' => 2, 'last_y' => 6, 'speed' => 5],
            // ['id' => 1, 'last_x' => 1, 'last_y' => 1, 'speed' => 5],
            ['id' => 2, 'last_x' => 4, 'last_y' => 7, 'speed' => 4]
        ];

        $attackRange = abs($request->get('attacker_pos_x') - $request->get('defender_pos_x')) + abs($request->get('attacker_pos_y') - $request->get('defender_pos_y'));

        $weaponRange = 1 ;

        $attacker = $testingObjectArray[$request->get('attacker_id')];
        $defender = $testingObjectArray[$request->get('defender_id')];

        $movementDistance = abs($attacker['last_x'] - $request->get('attacker_pos_x')) + abs($attacker['last_y'] - $request->get('attacker_pos_y'));

        if ($movementDistance > $attacker['speed'] ) 
        {
            return 'Invalid';
        } 
        else 
        {
            return 'Valid';
        }

        // return $request->all();
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
