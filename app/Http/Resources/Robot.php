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
            $this->mergeWhen($request->route()->getName() !== 'users.show', [
                'user' => $this->whenLoaded('user', new User($this->user), $this->user_id),
            ]),
            'model' => $this->model,
            'zone' => $this->zone,
            'created_at' => (string) $this->created_at,
        ];
    }
}