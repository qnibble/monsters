<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Derivedstats extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'derivedstats';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['character_id', 'max_hp', 'total_defense', 'speed'];
}
