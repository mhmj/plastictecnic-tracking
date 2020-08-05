<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/7/2020
 * Time: 2:05 PM
 */

namespace App\Http\Controllers\Movement\Creates;


use App\Http\Controllers\Packaging\Updates\UpdatePackagingStatus;
use App\Movement;
use Illuminate\Http\Request;

class CreateMovement
{
    /** @var  Movement */
    private $repository;

    /** @var  UpdatePackagingStatus */
    private $UpdatePackagingStatus;

    /**
     * CreateMovement constructor.
     * @param Movement $repository
     * @param UpdatePackagingStatus $UpdatePackagingStatus
     */
    public function __construct(Movement $repository, UpdatePackagingStatus $UpdatePackagingStatus)
    {
        $this->repository = $repository;
        $this->UpdatePackagingStatus = $UpdatePackagingStatus;
    }


    public function create(Request $request)
    {
        $model = $this->repository->create([
            'type_name' => $request->input('type_name'),
            'packaging_no' => $request->input('packaging_no'),
            'delivery_no' => $request->input('delivery_no'),
            'shipment_id' => $request->input('shipment_id'),
            'status' => $request->input('status'),
            'status_received' => $request->input('status_received'),
            'remark' => $request->input('remark'),
        ]);

        $status = $this->UpdatePackagingStatus->updates($request->input('packaging_no'),$request->input('status'));

        return $model;
    }

}