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
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'supervisor'=>$this->supervisor,
            'hiring_at'=>$this->hiring_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'hiring_date' => $this->hiring_date,
            'role'=>$this->roles()->pluck('name')->first(),
            'deleted_at'=>$this->deleted_at,
        ];
    }
}
