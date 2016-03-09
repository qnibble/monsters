<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statistics';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['character_id', 'strength_base', 'strength_mod', 'dexterity_base', 
    	'dexterity_mod', 'constitution_base', 'constitution_mod', 'intellegence_base', 'intellegence_mod'];


	/**
     * --------------------------------------
     * Relationships
     * --------------------------------------
     */

	public function character()
    {
        return $this->belongsTo('App\\Character');
    }
}
