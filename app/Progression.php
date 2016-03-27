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
     * Get all of the owning tracker models.
     */
    public function trackers()
    {
        return $this->morphTo();
    }
}
