<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Effect;
use App\Weapon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weapons = Weapon::all();

        return view('weapon.index', compact('weapons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $effectable_stats = Effect::lists('target_stat', 'id')->toArray();

        return view('weapon.create', compact('effectable_stats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $effectsJSON = [];
        $targetArray = $request->get('target');
        $durationArray = $request->get('duration');
        $target_statArray = $request->get('target_stat');
        $modifierArray = $request->get('modifier');

        for ($index = 0; $index < count($request->get('target')); $index++)
        {
            $effect = (object) array(
                'target' => $targetArray[$index],
                'duration' => $durationArray[$index],
                'target_stat' => $target_statArray[$index],
                'modifier'=> $modifierArray[$index]
            );

            array_push($effectsJSON, $effect);
        }

        Weapon::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'damage' => $request->get('damage'),
            'effects' => $effectsJSON
        ]);

        return redirect('weapon');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weapon = Weapon::find($id);
        $effectable_stats = Effect::lists('target_stat', 'id')->toArray();

        return view('weapon.show', compact('weapon', 'effectable_stats'));
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
        $weapon = Weapon::find($id);

        $effectsJSON = [];
        $targetArray = $request->get('target');
        $durationArray = $request->get('duration');
        $target_statArray = $request->get('target_stat');
        $modifierArray = $request->get('modifier');

        for ($index = 0; $index < count($request->get('target')); $index++)
        {
            $effect = (object) array(
                'target' => $targetArray[$index],
                'duration' => $durationArray[$index],
                'target_stat' => $target_statArray[$index],
                'modifier'=> $modifierArray[$index]
            );

            array_push($effectsJSON, $effect);
        }

        $weapon->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'damage' => $request->get('damage'),
            'effects' => $effectsJSON
        ]);

        return redirect('weapon');
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
