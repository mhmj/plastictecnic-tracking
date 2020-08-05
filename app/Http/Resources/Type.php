<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Category as CategoryModel;
use Carbon\Carbon;

class Type extends JsonResource
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
            'category_id' => CategoryModel::where('id', $this->category_id)->first(),
            'name' =>  $this->name,
            'size' => $this->size,
            'description' => $this->description,
            'color' => $this->color,
            'remark' => $this->remark,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
