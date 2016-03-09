<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activebattle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activebattle';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'character_id',
        'last_x',
        'last_y',
		'current_hp'
    ];

    // protected $casts = [
    //     'hasAbilities' => 'json',
    // ];


    /**
     * --------------------------------------
     * Relationships
     * --------------------------------------
     */

	public function character()
    {
        return $this->hasOne(Character::class);
    }
}
