<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ability;
use App\Armour;
use App\Character;
use App\Effect;
use App\Item;
use App\Mapdata;
use App\User;
use App\Weapon;

use Datatables;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::with(['statistics', 'equipmentslots', 'friends', 'derivedstats'])->paginate(5);
        $effects = Effect::paginate(5);
        $effect_names = Effect::lists('name', 'id')->toArray();
        $items = Item::paginate(5);
        $maps = Mapdata::paginate(5);
        $abilities = Ability::paginate(5);
        $armours = Armour::paginate(5);
        $weapons = Weapon::paginate(5);

        return view('dashboard', compact('characters', 'effects', 'effect_names', 'items', 'maps', 'abilities', 'armours', 'weapons'));
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
