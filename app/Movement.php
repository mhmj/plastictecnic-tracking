<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table='movement';

    protected $fillable = [
        'type_name', 'packaging_no', 'delivery_no', 'shipment_id','status','status_received', 'remark', 'remark_2', 'image','created_at'
    ];
}