<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentSlot extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipmentslots';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['character_id'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['head_id', 'body_id', 'hands_id', 'feet_id', 'weapon_id'];

    /**
     * The eager loaded relationships for the model.
     *
     * @var array
     */
    protected $with = ['head', 'body', 'hands', 'feet', 'weapon'];

    /**
     * --------------------------------------
     * Relationships
     * --------------------------------------
     */

	public function character()
    {
        return $this->belongsTo('App\\Character');
    }

    public function head()
    {
        return $this->belongsTo(Armour::class, 'head_id');
    }

    public function body()
    {
        return $this->belongsTo(Armour::class, 'body_id');
    }

    public function hands()
    {
        return $this->belongsTo(Armour::class, 'hands_id');
    }

    public function feet()
    {
        return $this->belongsTo(Armour::class, 'feet_id');
    }

    public function weapon()
    {
        return $this->belongsTo(Weapon::class, 'weapon_id');
    }

}
