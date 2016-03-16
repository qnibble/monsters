<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Mapdata extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mapdata';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'number_cols', 'number_rows', 'enemy_data', 'ally_data'];

    protected $casts = [
        'enemy_data' => 'json',
        'ally_data' => 'json',
    ];

	/**
     * --------------------------------------
     * Relationships
     * --------------------------------------
     */

    public function allies()
    {
        $data = $this->select('id', 'ally_data')->get();
        $ally_ids = [];

        foreach ($data as $row) {
            foreach ($row->ally_data as $ally) {
                $ally_ids[] = [
                    'map_id' => $row->id, 
                    'character_id' => (int) $ally["character_id"]
                ];
            }
        }

        DB::statement('create temporary table ally_map (`character_id` INTEGER(11), `map_id` INTEGER(11))');
        DB::table('ally_map')->insert($ally_ids);

        return $this->belongsToMany(Character::class, 'ally_map', 'map_id', 'character_id');
    }

    public function enemies()
    {
        $data = $this->select('id', 'enemy_data')->get();
        $enemy_ids = [];

        foreach ($data as $row) {
            foreach ($row->enemy_data as $ally) {
                $enemy_ids[] = [
                    'map_id' => $row->id, 
                    'character_id' => (int) $ally["character_id"]
                ];
            }
        }

        DB::statement('create temporary table enemy_map (`character_id` INTEGER(11), `map_id` INTEGER(11))');
        DB::table('enemy_map')->insert($enemy_ids);

        return $this->belongsToMany(Character::class, 'enemy_map', 'map_id', 'character_id');
    }
}
