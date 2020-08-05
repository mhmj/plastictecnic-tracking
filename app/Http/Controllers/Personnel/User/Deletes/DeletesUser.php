<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 10:39 AM
 */

namespace App\Http\Controllers\Personnel\User\Deletes;

use App\User;
use App\Http\Resources\User as UserResources;

class DeletesUser
{
    /** @var  User */
    private $repository;

    /**
     * CreateUser constructor.
     * @param User $repository
     */
    public function __construct(User $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return new UserResources($data);
        }

    }

}