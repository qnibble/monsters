<?php

use App\Ability;
use App\Armour;
use App\Character;
use App\Effect;
use App\Item;
use App\Unitclass;
use App\Weapon;
use App\Mapdata;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $relationships = [
    	// 	"1" => 250,
    	// 	"2" => 350
    	// ];

        $testEffectJSON = [
            "1" => 50
        ];

        $effect = Effect::create([
                'name' => 'Test Effect (Heal)',
                'description' => 'Test Description (Increase current_hp by specified amount)',
                'target_stat' => 'current_hp'
        ]);

        /****************************************************************************************************************************/
        /*                                      88888888  88888888  88888888  88        88   888888                                 */
        /*                                         88        88     88        88 88  88 88  88                                      */
        /*                                         88        88     8888      88   88   88     88                                   */
        /*                                         88        88     88        88        88        88                                */
        /*                                      88888888     88     88888888  88        88   888888                                 */
        /****************************************************************************************************************************/

        $itemLongsword = Weapon::create([
                'icon' => 'ToDo',
                'name' => 'Longsword (Test)',
                'description' => 'A sword that is pretty long' ,
                'damage' => 5,
                'range' => 1
        ]);

        $itemWoodHelm = Armour::create([
                'icon' => 'ToDo',
                'name' => 'Wood Helm (Test)',
                'description' => 'A wooden helmet' ,
                'armour_value' => 1
        ]);

        $itemWoodPlate = Armour::create([
                'icon' => 'ToDo',
                'name' => 'Wood Breastplate (Test)',
                'description' => 'A wooden breastplate' ,
                'armour_value' => 2
        ]);

        $itemStrawGloves = Armour::create([
                'icon' => 'ToDo',
                'name' => 'Straw Gloves (Test)',
                'description' => 'A pair straw gloves' ,
                'armour_value' => 1
        ]);

        $itemStrawSandles = Armour::create([
                'icon' => 'ToDo',
                'name' => 'Straw Sandles (Test)',
                'description' => 'A pair straw sandles' ,
                'armour_value' => 1
        ]);

        /****************************************************************************************************************************/
        /*                        88888888  88              8888       888888    888888   888888888   888888                        */
        /*                      88          88             88  88     88        88        88         88                             */
        /*                     88           88            88888888       88        88     8888          88                          */
        /*                      88          88           88      88         88        88  88               88                       */
        /*                        88888888  8888888888  88        88   888888    888888   888888888   888888                        */
        /****************************************************************************************************************************/

        $bruiser = Unitclass::create([
            'name' => 'Bruiser',
            'description' => 'HP tank with strong melee capabilities',
            'level_data' => [0, 15, 30]
        ]);

        $valkyrie = Unitclass::create([
            'name' => 'Valkyrie',
            'description' => 'Armour based mid-ranged fighter with death magic',
            'level_data' => [0, 15, 30]
        ]);

        /****************************************************************************************************************************/
        /*      88888888  88    88      8888      888888        8888       88888888  88888888  88888888  888888     888888          */
        /*    88          88    88     88  88     88   88      88  88    88             88     88        88   88   88               */
        /*   88           88888888    88888888    888888      88888888  88              88     8888      888888       88            */
        /*    88          88    88   88      88   88   88    88      88  88             88     88        88   88         88         */
        /*      88888888  88    88  88        88  88    88  88        88   88888888     88     88888888  88    88   888888          */
        /****************************************************************************************************************************/

        $soulWindEffects = [];
        $soulWindPrimaryEffect = [
            'target' => 3,
            'duration' => 0,
            'target_stat' => 1,
            'modifier' => 5

        ];
        array_push($soulWindEffects, $soulWindPrimaryEffect);

        $soulWind = Ability::create([
            'name' => 'Soul Wind',
            'description' => 'Flay the soul of the target',
            'range' => 10,
            'effects' => $soulWindEffects
        ]);

        $characterAbilityData = [];
        $characterAbility1 = [
            'id' => $soulWind->id,
            'exp' => 0,  // Store Ability progression table in abilities table?
            'level' => 1
            // Perhaps an alphabetical string to indicate evolution path?
        ];
        array_push($characterAbilityData, $characterAbility1);

        $character = Character::create([
    			'name' => 'Vallis Obscuris', 
                'biography' => 'Their life story',
                'icon' => 'img/blue.png',
    			'class_id' => $bruiser->id,
                'starting_lvl' => '1',
                'current_lvl' => '1',
                'experience' => '0',
                'hasAbilities' => $characterAbilityData
        ]);

        $character->statistics()->create([
        	'strength_base' => '5',
        	'strength_mod' => '0',
        	'dexterity_base' => '5',
        	'dexterity_mod' => '0',
        	'constitution_base' => '5',
        	'constitution_mod' => '0',
        	'intellegence_base' => '5',
        	'intellegence_mod' => '0'
    	]);

        $character->derivedstats()->create([
            'max_hp' => ( $character->statistics->constitution_base + $character->statistics->constitution_mod ) * 5,
            'total_defense' => 0,
            'speed' => $character->statistics->dexterity_base + $character->statistics->dexterity_mod
        ]);

    	$character->equipmentslots()->create([
    		'head_id' => $itemWoodHelm->id,
			'body_id' => $itemWoodPlate->id,
			'hands_id' => $itemStrawGloves->id,
			'feet_id' => $itemStrawSandles->id,
            'weapon_id' => $itemLongsword->id
		]);

        $character2 = Character::create([
                'name' => 'Valencia Oberstrauss', 
                'biography' => 'Their life story',
                'icon' => 'img/red.png',
                'class_id' => $valkyrie->id,
                'starting_lvl' => '1',
                'current_lvl' => '1',
                'experience' => '0'
        ]);

        $character2->statistics()->create([
            'strength_base' => '3',
            'strength_mod' => '1',
            'dexterity_base' => '3',
            'dexterity_mod' => '1',
            'constitution_base' => '3',
            'constitution_mod' => '1',
            'intellegence_base' => '3',
            'intellegence_mod' => '1'
        ]);

        $character2->derivedstats()->create([
            'max_hp' => ( $character2->statistics->constitution_base + $character2->statistics->constitution_mod ) * 5,
            'total_defense' => 0,
            'speed' => $character2->statistics->dexterity_base + $character2->statistics->dexterity_mod
        ]);

        $character2->equipmentslots()->create([
            'head_id' => $itemWoodHelm->id,
            'body_id' => $itemWoodPlate->id,
            'hands_id' => $itemStrawGloves->id,
            'feet_id' => $itemStrawSandles->id,
            'weapon_id' => $itemLongsword->id
        ]);

        $character->friends()->attach($character2, ['value' => '250']);

        /****************************************************************************************************************************/
        /*                                      88        88      8888      888888    888888                                        */
        /*                                      88 88  88 88     88  88     88   88  88                                             */
        /*                                      88   88   88    88888888    88 888      88                                          */
        /*                                      88        88   88      88   88             88                                       */
        /*                                      88        88  88        88  88        888888                                        */
        /****************************************************************************************************************************/
        $enemy_data = [];
        
        $enemy = (object) array(
            'character_id' => 2,
            'x_loc' => 5,
            'y_loc' => 1
        );

        array_push($enemy_data, $enemy);

        $ally_data = [];

        $ally = (object) array (
            'character_id' => 1,
            'x_loc' => 5,
            'y_loc' => 10
        );

        array_push($ally_data, $ally);

        $testingMap = Mapdata::create([
            'name' => 'Test Map',
            'number_cols' => 10,
            'number_rows' => 10,
            'enemy_data' => $enemy_data,
            'ally_data' => $ally_data
        ]);
    }
}
