<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 5:11 PM
 */

namespace App\Http\Controllers\Shipment\Lists;


use App\Shipment;
use App\Http\Resources\Shipment as ShipmentResources;

class ListShipment
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

    public function list()
    {
        $data = $this->repository->all();

        return ShipmentResources::collection($data);
    }

    public function details($id)
    {
        $data = $this->repository->findOrFail($id);
        return new ShipmentResources($data);

        return ShipmentResources::collection($data);
    }

}