<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/8/2020
 * Time: 11:19 AM
 */

namespace App\Http\Controllers\Packaging\Updates;


use App\Packaging;

class UpdatePackagingRemark
{
    /** @var  Packaging */
    private $repository;

    /**
     * UpdatePackagingRemark constructor.
     * @param Packaging $repository
     */
    public function __construct(Packaging $repository)
    {
        $this->repository = $repository;
    }

    public function updates($packagingNo, $remark)
    {
        $data = $this->repository->where('packaging_no', $packagingNo)->first();

        $data->remark = $remark;

        if($data->save()){
            return $data;
        }
    }

}