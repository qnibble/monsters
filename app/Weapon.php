<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'weapons';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon',
		'name',
		'description',
        'damage',
    	'range',
		'effects'
    ];

    protected $casts = [
        'effects' => 'json',
    ];
}
