<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';

    protected $fillable = [
        'type', 'name', 'registration_no', 'address','post_code', 'state', 'phone_no', 'fax_no','email','location', 'image','remark'
    ];
}