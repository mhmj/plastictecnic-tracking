<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/7/2020
 * Time: 2:05 PM
 */

namespace App\Http\Controllers\Movement\Deletes;


use App\Http\Controllers\Packaging\Updates\UpdatePackagingStatus;
use App\Movement;
use App\Http\Resources\Movement as MovementResources;
use App\Packaging;

class DeleteMovement
{
   /** @var  Movement */
    private $movement;

    /** @var  Packaging */
    private $packaging;

    /** @var  UpdatePackagingStatus */
    private $UpdatePackagingStatus;

    /**
     * DeleteMovement constructor.
     * @param Movement $movement
     * @param Packaging $packaging
     * @param UpdatePackagingStatus $UpdatePackagingStatus
     */

    public function __construct(Movement $movement, Packaging $packaging, UpdatePackagingStatus $UpdatePackagingStatus)
    {
        $this->movement = $movement;
        $this->packaging = $packaging;
        $this->UpdatePackagingStatus = $UpdatePackagingStatus;
    }


    public function delete($id, $status)
    {
        $movement = $this->movement->findOrFail($id);

        $status = $this->UpdatePackagingStatus->updates($movement->packaging_no,$status);

//        $packaging = $this->packaging->where('packaging_no', $movement->packaging_no)->first();
//
//        $packaging->status = $status;

//        $packaging->save();

        if($movement->delete()){

            return new MovementResources($movement);
        }


    }


}