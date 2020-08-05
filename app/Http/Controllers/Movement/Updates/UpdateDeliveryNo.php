<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/7/2020
 * Time: 3:51 PM
 */

namespace App\Http\Controllers\Movement\Updates;


use App\Movement;

class UpdateDeliveryNo
{
    /** @var  Movement */
    private $repository;

    /**
     * UpdateDeliveryNo constructor.
     * @param Movement $repository
     */
    public function __construct(Movement $repository)
    {
        $this->repository = $repository;
    }

    public function updates($deliveryNo, $newDeliveryNo)
    {
        $data = $this->repository->where('delivery_no','=',$deliveryNo)->update(['delivery_no' => $newDeliveryNo]);
    }


}