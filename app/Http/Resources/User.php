<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            $this->mergeWhen($request->route()->getName() !== 'robots.show', [
                'robot' => $this->whenLoaded('robot', new Robot($this->robot), $this->robot_id),
            ]),
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => (string) $this->created_at,
        ];
    }
}
