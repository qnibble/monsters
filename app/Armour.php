<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armour extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'armours';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'icon',
        'name',
        'type',
		'description',
    	'armour_value',
		'effects'
    ];

    protected $casts = [
        'effects' => 'json',
    ];
}
