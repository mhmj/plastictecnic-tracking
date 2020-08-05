<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function company()
    {
        return view('pages.Admin.Personnel.Company.index');
    }
    public function user()
    {
        return view('pages.Admin.Personnel.User.index');
    }
    public function Packaging()
    {
        return view('pages.Admin.Packaging.Packaging.index');
    }
    public function Category()
    {
        return view('pages.Admin.Packaging.Category.index');
    }
    public function Type()
    {
        return view('pages.Admin.Packaging.Type.index');
    }

    public function ShipmentIn()
    {
        return view('pages.Admin.Shipment.In.index');
    }

    public function ShipmentOut()
    {
        return view('pages.Admin.Shipment.Out.index');
    }

//    public function ShipmentOutDetails()
//    {
//        return view('pages.Admin.Shipment.Out.details');
//    }
}
