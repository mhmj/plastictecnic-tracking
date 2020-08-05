<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 5:13 PM
 */

namespace App\Http\Controllers\Shipment\Creates;

use App\Shipment;
use App\Http\Resources\Shipment as ShipmentResources;
use Illuminate\Http\Request;

class CreateShipment
{
    /** @var  Shipment */
    private $repository;

    /**
     * ListShipment constructor.
     * @param Shipment $repository
     */
    public function __construct(Shipment $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        $model = $this->repository->create([
            'delivery_no' => $request->input('delivery_no'),
            'vehicle_no' => $request->input('vehicle_no'),
            'remark' => $request->input('remark'),
            'status' => $request->input('status'),
            'created_by' => $request->input('created_by'),
            'verified_by' => $request->input('verified_by'),
            'delivery_by' => $request->input('delivery_by'),
            'received_by' => $request->input('received_by'),
            'company_id' => $request->input('company_id'),
        ]);
        return $model;
    }
}