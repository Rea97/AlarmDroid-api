<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = ['robot_id', 'type', 'message'];

    /**
     * One to many relation with Robot.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }
}
