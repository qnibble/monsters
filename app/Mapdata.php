<?php

namespace App;

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

}
