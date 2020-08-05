<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/7/2020
 * Time: 2:17 PM
 */

namespace App\Http\Controllers\Packaging\Updates;


use App\Packaging;

class  UpdatePackagingStatus
{
    /** @var  Packaging */
    private $repository;

    /**
     * UpdatePackagingStatus constructor.
     * @param Packaging $repository
     */
    public function __construct(Packaging $repository)
    {
        $this->repository = $repository;
    }

    public function updates($packagingNo,$status)
    {
        $data = $this->repository->where('packaging_no', $packagingNo)->first();

        $data->status = $status;

        if($data->save()){
            return $data;
        }
    }


}