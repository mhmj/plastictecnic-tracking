<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/7/2020
 * Time: 10:51 AM
 */

namespace App\Http\Controllers\Packaging\Creates;


use App\Packaging;
use Illuminate\Http\Request;

class CreatePackaging
{
    /** @var Packaging */
    private $repository;

    /**
     * CreatePackaging constructor.
     * @param Packaging $repository
     */
    public function __construct(Packaging $repository)
    {
        $this->repository = $repository;
    }

    public function create($quantity,$packagingNo, Request $request)
    {
        $packagingNo = intval($packagingNo);
        $packagingNo = $packagingNo-1;
        $type_name = $request->input('type_name').' - ';
        for ($i = 1; $i <= $quantity; $i++) {
            $packagingNo = $packagingNo+1;

            $model = $this->repository->create([
                'type_name' => $request->input('type_name'),
                'category_id' => $request->input('category_id'),
                'packaging_no' => $type_name.$packagingNo,
                'status' => 'IN',
                'remark' => '-',
                'remark_2' => '-',
            ]);
        }
    }


}