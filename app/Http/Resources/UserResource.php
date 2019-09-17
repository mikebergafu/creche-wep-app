<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'fullname'=>$this->fullname,
            'position'=>$this->position,
            'role'=>$this->role,
            'email'=>$this->email,
            'registered_on'=>$this->created_at,
            'children'=>$this->child_fullname,
            'additional'=>$this->guardian_cell,
        ];

    }

}
