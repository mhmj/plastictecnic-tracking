<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 5:13 PM
 */

namespace App\Http\Controllers\Shipment\Updates;

use App\Http\Controllers\Movement\Updates\UpdateDeliveryNo;
use App\Movement;
use App\Shipment;
use App\Http\Resources\Shipment as ShipmentResources;
use Illuminate\Http\Request;

class UpdateShipment
{
    /** @var  Shipment */
    private $repository;

    /** @var  UpdateDeliveryNo */
    private $UpdateDeliveryNo;

    /**
     * UpdateShipment constructor.
     * @param Shipment $repository
     * @param UpdateDeliveryNo $UpdateDeliveryNo
     */
    public function __construct(Shipment $repository, UpdateDeliveryNo $UpdateDeliveryNo)
    {
        $this->repository = $repository;
        $this->UpdateDeliveryNo = $UpdateDeliveryNo;
    }


    public function updates($id,Request $request)
    {
        $data = $this->repository->findOrFail($id);

        $this->UpdateDeliveryNo->updates($data->delivery_no, $request->input('delivery_no'));

        $data -> delivery_no = $request->input('delivery_no');
        $data -> vehicle_no = $request->input('vehicle_no');
        $data -> remark = $request->input('remark');
        $data -> status = $request->input('status');
        $data -> created_by = $request->input('created_by');
        $data -> verified_by = $request->input('verified_by');
        $data -> delivery_by = $request->input('delivery_by');
        $data -> received_by = $request->input('received_by');
        $data -> company_id = $request->input('company_id');


        if($data->save())
        {
            return $data;
        }
    }
}