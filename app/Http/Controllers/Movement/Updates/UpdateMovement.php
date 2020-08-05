<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/8/2020
 * Time: 4:26 PM
 */

namespace App\Http\Controllers\Movement\Updates;


use App\Http\Controllers\Packaging\Updates\UpdatePackagingRemark;
use App\Http\Controllers\Packaging\Updates\UpdatePackagingStatus;
use App\Movement;
use Illuminate\Http\Request;

class UpdateMovement
{
    /** @var  Movement*/
    private $repository;

    /** @var  UpdatePackagingStatus */
    private $UpdatePackagingStatus;

    /** @var  UpdatePackagingRemark */
    private $UpdatePackagingRemark;

    /**
     * UpdateMovement constructor.
     * @param Movement $repository
     * @param UpdatePackagingStatus $UpdatePackagingStatus
     * @param UpdatePackagingRemark $UpdatePackagingRemark
     */
    public function __construct(Movement $repository, UpdatePackagingStatus $UpdatePackagingStatus, UpdatePackagingRemark $UpdatePackagingRemark)
    {
        $this->repository = $repository;
        $this->UpdatePackagingStatus = $UpdatePackagingStatus;
        $this->UpdatePackagingRemark = $UpdatePackagingRemark;
    }


    public function updates(Request $request, $status, $option)
    {
        $input = $request->all();
        $count = count($input);

        for ($i=0; $i<$count; $i++) {
            if($option === 'clean')
            {
                $data = $this->repository->findOrFail($input[$i]['id']);

                $data->status_received = 'IN';
                $data->remark = '-';
                $data->save();
                $status = $this->UpdatePackagingStatus->updates($input[$i]['packaging_no'],'IN');
            }
            if($option === 'damage')
            {
                $data = $this->repository->findOrFail($input[$i]['id']);

                $data->status_received = 'IN';
                $data->remark = 'Damage';
                $data->save();
                $status = $this->UpdatePackagingStatus->updates($input[$i]['packaging_no'],'IN');
                $remark = $this->UpdatePackagingRemark->updates($input[$i]['packaging_no'],'Damage');
            }
        }
    }
}