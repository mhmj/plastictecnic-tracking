<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/7/2020
 * Time: 5:00 PM
 */

namespace App\Http\Controllers\Personnel\User\Lists;


use App\User;
use App\Http\Resources\User as UserResources;

class ListUser
{
    /** @var User  */
    private $repository;

    /**
     * ListUser constructor.
     * @param User $repository
     */
    public function __construct(User $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        $data = $this->repository->all();
        return UserResources::collection($data);
    }
}