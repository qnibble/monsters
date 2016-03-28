<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'characters';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'biography',
        'icon',
		'class_id',
        'starting_lvl',
        'current_lvl',
        'experience',
        'hasAbilities'
    ];

    protected $casts = [
        'hasAbilities' => 'json', // Rename|Rethink
    ];


    /**
     * --------------------------------------
     * Relationships
     * --------------------------------------
     */

    public function friends()
    {
        return $this->belongsToMany(Character::class, 'character_character', 'character_id', 'friend_id')->withPivot('value');
    }

	public function statistics()
    {
        return $this->hasOne('App\\Statistic');
    }

    public function derivedstats()
    {
        return $this->hasOne(Derivedstats::class);
    }

    public function equipmentslots()
    {
        return $this->hasOne('App\\EquipmentSlot');
    }

    public function unitclass()
    {
        return $this->belongsTo(Unitclass::class, 'class_id');
    }

    public function progress_data()
    {
        return $this->morphOne(Progression::class, 'tracker');
    }
}
