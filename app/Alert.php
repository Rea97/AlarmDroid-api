<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
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
