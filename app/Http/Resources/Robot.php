<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Robot extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'model' => $this->model,
            'zone' => $this->zone,
            'created_at' => (string) $this->created_at,
        ];
    }
}
