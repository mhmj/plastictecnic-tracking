<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/7/2020
 * Time: 5:38 PM
 */

namespace App\Http\Controllers\Packaging\Lists;

use App\Packaging;
use App\Http\Resources\Packaging as PackagingResources;

class ListPackagingBasedOnCategory
{
    /** @var  Packaging */
    private $repository;

    /**
     * ListPackagingBasedOnCategory constructor.
     * @param Packaging $repository
     */
    public function __construct(Packaging $repository)
    {
        $this->repository = $repository;
    }

    public function list($id)
    {
        $data = $this->repository->where('category_id', $id)->latest()->get();
        return PackagingResources::collection($data);
        //return response()->json($data);
    }
}