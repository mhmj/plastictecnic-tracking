<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 10:38 AM
 */

namespace App\Http\Controllers\Personnel\Company\Deletes;


use App\Company;
use App\Http\Resources\Company as CompanyResources;

class DeleteCompany
{
    /** @var  Company */
    private $repository;

    /**
     * DeleteCompany constructor.
     * @param Company $repository
     */
    public function __construct(Company $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id){

        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return new CompanyResources($data);
        }
    }

}