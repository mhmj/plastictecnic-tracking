<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Category as CategoryModel;
use App\Company as CompanyModel;
use Carbon\Carbon;

class Packaging extends JsonResource
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
            'type_name' => $this->type_name,
            'category_id' =>  new Category(CategoryModel::find($this->category_id)),
            'packaging_no' => $this->packaging_no,
            'status' => $this->status,
            'remark' => $this->remark,
            'remark_2' => $this->remark_2,
            'image' => $this->image,
            'company_id' => CompanyModel::where('id', $this->company_id)->first(),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
