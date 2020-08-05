<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table='type';

    protected $fillable = [
        'category_id', 'name', 'size', 'description', 'color','remark'
    ];
}