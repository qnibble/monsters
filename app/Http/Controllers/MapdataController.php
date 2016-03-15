<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Character;
use App\Mapdata;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MapdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Mapdata::all();

        return view('mapdata.index', compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $character_names = Character::lists('name', 'id')->toArray();

        return view('mapdata.create', compact('character_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allies = [];
        $enemies = [];

        $allyCharacterIDs = $request->get('ally_character_id');
        $allyCharacterXs = $request->get('ally_character_start_x');
        $allyCharacterYs = $request->get('ally_character_start_y');
        $enemyCharacterIDs = $request->get('enemy_character_id');
        $enemyCharacterXs = $request->get('enemy_character_start_x');
        $enemyCharacterYs = $request->get('enemy_character_start_y');

        for ($index = 0; $index < count($request->get('ally_character_id')); $index++)
        {
            $ally = (object) array(
                'character_id' => $allyCharacterIDs[$index],
                'x_loc' => $allyCharacterXs[$index],
                'y_loc' => $allyCharacterYs[$index]
            );

            array_push($allies, $ally);
        }

        for ($index = 0; $index < count($request->get('enemy_character_id')); $index++)
        {
            $enemy = (object) array(
                'character_id' => $enemyCharacterIDs[$index],
                'x_loc' => $enemyCharacterXs[$index],
                'y_loc' => $enemyCharacterYs[$index]
            );

            array_push($enemies, $enemy);
        }

        $map = Mapdata::create([
            'name' => $request->get('name'),
            'number_cols' => $request->get('number_cols'),
            'number_rows' => $request->get('number_rows'),
            'enemy_data' => $enemies,
            'ally_data' => $allies
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $map = Mapdata::find($id);
        $character_names = Character::lists('name', 'id')->toArray();

        return view('mapdata.show', compact('map', 'character_names'));
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
        $allies = [];
        $enemies = [];
        $map = Mapdata::find($id);

        $allyCharacterIDs = $request->get('ally_character_id');
        $allyCharacterXs = $request->get('ally_character_start_x');
        $allyCharacterYs = $request->get('ally_character_start_y');
        $enemyCharacterIDs = $request->get('enemy_character_id');
        $enemyCharacterXs = $request->get('enemy_character_start_x');
        $enemyCharacterYs = $request->get('enemy_character_start_y');

        for ($index = 0; $index < count($request->get('ally_character_id')); $index++)
        {
            $ally = (object) array(
                'character_id' => $allyCharacterIDs[$index],
                'x_loc' => $allyCharacterXs[$index],
                'y_loc' => $allyCharacterYs[$index]
            );

            array_push($allies, $ally);
        }

        for ($index = 0; $index < count($request->get('enemy_character_id')); $index++)
        {
            $enemy = (object) array(
                'character_id' => $enemyCharacterIDs[$index],
                'x_loc' => $enemyCharacterXs[$index],
                'y_loc' => $enemyCharacterYs[$index]
            );

            array_push($enemies, $enemy);
        }

        $map->update([
            'name' => $request->get('name'),
            'number_cols' => $request->get('number_cols'),
            'number_rows' => $request->get('number_rows'),
            'enemy_data' => $enemies,
            'ally_data' => $allies
        ]);

        return redirect()->back();
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
