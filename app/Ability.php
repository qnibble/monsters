<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'abilities';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'description',
    	'range',
		'effects'
    ];

    protected $casts = [
        'effects' => 'json',
    ];

    public function progress_data()
    {
        return $this->morphMany('App\Progression', 'tracker');
    }
}
