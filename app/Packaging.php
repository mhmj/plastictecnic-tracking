<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    protected $table='packaging';

    protected $fillable = [
        'type_name', 'category_id', 'packaging_no', 'status','remark', 'remark_2', 'image', 'company_id','created_at','updated_at'
    ];
}