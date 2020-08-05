<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/7/2020
 * Time: 5:39 PM
 */

namespace App\Http\Controllers\Packaging\Lists;

use App\Type;

class ListPackagingType
{
    /** @var  Type */
    private $repository;

    /**
     * ListPackagingType constructor.
     * @param Type $repository
     */
    public function __construct(Type $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        $data = $this->repository->all();
        return response()->json($data);
    }

    public function list($id)
    {
        $data = $this->repository->where('category_id', $id)->get();
        return response()->json($data);
    }
}