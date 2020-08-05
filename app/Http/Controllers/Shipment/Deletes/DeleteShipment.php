<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 5:13 PM
 */

namespace App\Http\Controllers\Shipment\Deletes;

use App\Shipment;
use App\Http\Resources\Shipment as ShipmentResources;

class DeleteShipment
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

    public function delete()
    {

    }
}