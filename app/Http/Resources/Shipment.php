<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Company as CompanyModel;
use Carbon\Carbon;

class Shipment extends JsonResource
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
            'delivery_no' => $this->delivery_no,
            'company_id' => CompanyModel::where('id', $this->company_id)->first(),
            'vehicle_no' =>  $this->vehicle_no,
            'created_by' => $this->created_by,
            'verified_by' => $this->verified_by,
            'delivery_by' => $this->delivery_by,
            'received_by' => $this->received_by,
            'remark' => $this->remark,
            'remark_2' => $this->remark_2,
            'status' => $this->status,
            'image' => $this->image,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
