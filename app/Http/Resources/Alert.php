<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Alert extends JsonResource
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
            'robot' => $this->whenLoaded('robot', new Robot($this->robot), $this->robot_id),
            'type' => $this->type,
            'message' => $this->message,
            'created_at' => (string) $this->created_at,
        ];
    }
}
