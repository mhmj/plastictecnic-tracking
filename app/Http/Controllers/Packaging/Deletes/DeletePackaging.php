<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/7/2020
 * Time: 12:22 PM
 */

namespace App\Http\Controllers\Packaging\Deletes;


use App\Packaging;
use App\Http\Resources\Packaging as PackagingResources;

class DeletePackaging
{

    /** @var  Packaging */
    private $repository;

    /**
     * DeletePackaging constructor.
     * @param Packaging $repository
     */
    public function __construct(Packaging $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id){

        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return new PackagingResources($data);
        }
    }


}