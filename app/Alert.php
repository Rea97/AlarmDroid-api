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
        return self::create([
            'robot_id' => $robot->id,
            'type' => 'Incendio',
            'message' => 'Atención: Se ha detectado un incendio. Se recomienda usar extinguidor o en caso mayor, al escuchar la alarma, ver humo o fuego conservar la calma y retirarse de la zona de riesgo, se recomienda el uso de un pañuelo húmedo, taparse nariz y boca y esperar el arribo del servicio de bomberos.',
        ]);
    }

    public static function createGasAlert(Robot $robot)
    {
        return self::create([
            'robot_id' => $robot->id,
            'type' => 'Gases detectados',
            'message' => 'Atención: Se ha detectado un alto nivel de gases nocivos, la exposición prolongada a estos gases (inflamables, corrosivos, tóxicos) puede ser dañina para las personas desde quemaduras e inclusive si se llegan a inhalar o absorber a través de la piel puede causar la muerte. Se recomienda usar la protección adecuada.',
        ]);
    }

    public static function createTemperatureAlert(Robot $robot)
    {
        return self::create([
            'robot_id' => $robot->id,
            'type' => 'Mala temperatura',
            'message' => 'Atención: Se ha detectado un cambio en la temperatura del ambiente, los cambios bruscos de temperatura ya sean altas o bajas temperaturas pueden afectar a las personas desde irritaciones en la piel, dificultades para moverse, mareos o inclusive puede llegar a afectar al sistema inmune. Se recomienda tener cuidado con los cambios de temperatura.',
        ]);
    }
}
