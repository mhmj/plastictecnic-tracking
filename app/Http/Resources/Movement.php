<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Shipment as ShipmentModel;
use Carbon\Carbon;

class Movement extends JsonResource
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
            'packaging_no' => $this->packaging_no,
            'delivery_no' => $this->delivery_no,
            'shipment_id' => new Shipment(ShipmentModel::find($this->shipment_id)),
            'status' => $this->status,
            'status_received' => $this->status_received,
            'remark' => $this->remark,
            'remark_2' => $this->remark_2,
            'image' => $this->image,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
