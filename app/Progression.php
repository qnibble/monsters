<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progression extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'progression';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'tracker_id',
		'tracker_type',
    	'progress_matrix',
		'tier1',
		'tier2',
		'tier3'
    ];

    protected $casts = [
        'progress_matrix' => 'array'
    ];

    /**
     * Get all of the owning tracker models.
     */
    public function trackers()
    {
        return $this->morphTo();
    }
}
