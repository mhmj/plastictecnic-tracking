<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class Company extends JsonResource
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
            'type' => $this->type,
            'name' =>  $this->name,
            'registration_no' => $this->registration_no,
            'address' => $this->address,
            'post_code' => $this->post_code,
            'state' => $this->state,
            'phone_no' => $this->phone_no,
            'fax_no' => $this->fax_no,
            'email' => $this->email,
            'location' => $this->location,
            'image' => $this->image,
            'remark' => $this->remark,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
