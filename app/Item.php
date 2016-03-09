<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['icon', 'name', 'type', 'description', 'effects'];

    protected $casts = [
        'effects' => 'json',
    ];
}
