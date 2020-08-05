<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/7/2020
 * Time: 11:58 AM
 */

namespace App\Http\Controllers\Type\Deletes;

use App\Type;
use App\Http\Resources\Type as TypeResources;

class DeleteType
{
    /** @var  Type */
    private $repository;

    /**
     * CreateType constructor.
     * @param Type $repository
     */
    public function __construct(Type $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return new TypeResources($data);
        }
    }
}