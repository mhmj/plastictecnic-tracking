<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/7/2020
 * Time: 5:52 PM
 */

namespace App\Http\Controllers\Packaging\Lists;

use App\Packaging;
use App\Http\Resources\Packaging as PackagingResources;

class ListPackagingBasedOnType
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

    public function list($type_name)
    {
        $data = $this->repository->where('type_name', $type_name)->where('status','IN')->latest()->get();
        return response()->json($data);
    }
}