<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table='shipment';

    protected $fillable = [
        'delivery_no', 'company_id', 'vehicle_no', 'created_by','verified_by', 'delivery_by', 'received_by', 'remark', 'remark_2','status','image','created_at','updated_at'
    ];
}