<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Effect;
use App\Ability;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abilities = Ability::all();

        return view('abilities.index', compact('abilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $effectable_stats = Effect::lists('target_stat', 'id')->toArray();

        return view('abilities.create', compact('effectable_stats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
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

        $ability = Ability::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'range' => $request->get('range'),
            'effects' => $effectsJSON
        ]);

        return redirect('ability');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ability = Ability::find($id);
        $effectable_stats = Effect::lists('target_stat', 'id')->toArray();

        return view('abilities.show', compact('ability', 'effectable_stats'));
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
        $ability = Ability::find($id);

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

        $ability->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'range' => $request->get('range'),
            'effects' => $effectsJSON
        ]);

        return redirect('ability');
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
