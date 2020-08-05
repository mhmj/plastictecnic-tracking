<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/7/2020
 * Time: 11:59 AM
 */

namespace App\Http\Controllers\Type\Lists;


use App\Type;
use App\Http\Resources\Type as TypeResources;

class ListType
{
    /** @var  Type */
    private $repository;

    /**
     * ListType constructor.
     * @param Type $repository
     */
    public function __construct(Type $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        $data = $this->repository->latest()->get();

        return TypeResources::collection($data);
    }


}