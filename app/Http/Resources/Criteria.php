<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Criteria extends JsonResource
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
            'name' => $this->name,
             'type_id' =>$this->type_id,
             'roles' => $this->role()->pluck('role_id'),
             'group_id' =>$this->group()->pluck('group_id'),
        ];
    }
}
