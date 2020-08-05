<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/7/2020
 * Time: 5:39 PM
 */

namespace App\Http\Controllers\Packaging\Lists;
use App\Category;

class ListPackagingCategory
{
    /** @var  Category */
    private $repository;

    /**
     * ListPackagingType constructor.
     * @param Type $repository
     */
    public function __construct(Category $repository)
    {
        $this->repository = $repository;
    }


    public function list()
    {
        $data = $this->repository->all();
        return response()->json($data);
    }
}