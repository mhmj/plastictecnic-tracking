<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/7/2020
 * Time: 9:18 AM
 */

namespace App\Http\Controllers\Packaging\Lists;


use App\Packaging;

class ListMaximumPackagingNo
{
    /** @var  Packaging */
    private $repository;

    /**
     * ListMaximumPackagingNo constructor.
     * @param Packaging $repository
     */
    public function __construct(Packaging $repository)
    {
        $this->repository = $repository;
    }

    public function execute($categoryId, $type_name)
    {
        $data = $this->repository->where('category_id', $categoryId)
                                 ->where('type_name',$type_name)
                                 ->orderBY('id','desc')
                                 ->first();

        if(!$data)
        {
            $number = 100001;
            return response()->json($number);
        }
        if($data)
        {
            $splitter = explode(' ', $data->packaging_no);
            $integer = intval($splitter[2]);
            $number = $integer +1;
            return response()->json($number);
        }

    }


}