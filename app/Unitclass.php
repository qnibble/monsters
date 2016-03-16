<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitclass extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'unitclasses';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'description',
        'level_data'
    ];

    protected $casts = [
        'level_data' => 'array',
    ];
}
