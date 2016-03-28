<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;
use App\Ability;
use App\Armour;
use App\Character;
use App\Unitclass;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Character::with(['statistics', 'equipmentslots'])->get())->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::with(['statistics', 'unitclass', 'equipmentslots', 'friends'])->get();

        return view('character.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCharacters = Character::all();
        $armours_head = Armour::where('type', 'helm')->get();
        $armours_head_list = Armour::where('type', 'helm')->lists('name', 'id')->toArray();
        $armours_body = Armour::where('type', 'chest')->lists('name', 'id')->toArray();
        $armours_arms = Armour::where('type', 'hands')->lists('name', 'id')->toArray();
        $armours_feet = Armour::where('type', 'feet')->lists('name', 'id')->toArray();
        $unitclasses = Unitclass::lists('name', 'id')->toArray();

        return view('character.create', compact('unitclasses', 'allCharacters', 'armours_head', 'armours_head_list', 'armours_body', 'armours_arms', 'armours_feet'));
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
        $character = Character::with(['statistics', 'derivedstats', 'unitclass', 'equipmentslots', 'progress_data'])->find($id);
        $armours_head = Armour::where('type', 'helm')->get();
        // return $character->progress_data;
        // return $character;
        // return $character->progress_data->progress_matrix;
        $all_abilities = Ability::all();

        return view('character.show', compact('character', 'all_abilities', 'armours_head'));
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
