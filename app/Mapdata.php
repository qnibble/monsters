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
    protected $fillable = ['enemy_data'];


	/**
     * --------------------------------------
     * Relationships
     * --------------------------------------
     */

}
