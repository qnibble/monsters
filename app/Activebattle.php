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
        'turn_number',
		'current_hp',
        'has_moved' 
    ];

    protected $casts = [
        'has_moved' => 'boolean',
    ];


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
