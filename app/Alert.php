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

    public static function createFireAlert(Robot $robot)
    {
        return self::create( [
            'robot_id' => $robot->id,
            'type' => 'Incendio',
            'message' => 'Aut molestias ut ut incidunt eligendi. Quod unde non recusandae consequatur tempore suscipit totam et. Soluta non autem pariatur ut. Odio non eveniet itaque deleniti possimus consequuntur non.',
        ]);
    }

    public static function createGasAlert(Robot $robot)
    {
        return self::create([
            'robot_id' => $robot->id,
            'type' => 'Alta concentración de gas',
            'message' => 'Aut molestias ut ut incidunt eligendi. Quod unde non recusandae consequatur tempore suscipit totam et. Soluta non autem pariatur ut. Odio non eveniet itaque deleniti possimus consequuntur non.',
        ]);
    }

    public static function createTemperatureAlert(Robot $robot)
    {
        return self::create([
            'robot_id' => $robot->id,
            'type' => 'Mala temperatura',
            'message' => 'Aut molestias ut ut incidunt eligendi. Quod unde non recusandae consequatur tempore suscipit totam et. Soluta non autem pariatur ut. Odio non eveniet itaque deleniti possimus consequuntur non.',
        ]);
    }
}
