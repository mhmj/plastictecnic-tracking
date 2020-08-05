<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24/7/2020
 * Time: 10:27 AM
 */

namespace App\Http\Controllers\Movement\Lists;


use App\Movement;

class SearchMovementPackaging
{
    /** @var  Movement */
    private $repository;

    /**
     * SearchMovementPackaging constructor.
     * @param Movement $repository
     */
    public function __construct(Movement $repository)
    {
        $this->repository = $repository;
    }

    public function search($packagingNo, $status)
    {

        $data = $this->repository->where('packaging_no', $packagingNo)->where('status_received',$status)->first();
        return response()->json($data);
    }


}