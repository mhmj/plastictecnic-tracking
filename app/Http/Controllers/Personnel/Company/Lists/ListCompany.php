<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/7/2020
 * Time: 4:21 PM
 */

namespace App\Http\Controllers\Personnel\Company\Lists;


use App\Company;
use App\Http\Resources\Company as CompanyResources;

class ListCompany
{
    /** @var  Company */
    private $repository;

    /**
     * ListCompany constructor.
     * @param Company $repository
     */
    public function __construct(Company $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        $data = $this->repository->all();
        return CompanyResources::collection($data);
    }

    public function dropdownList()
    {
        $data = $this->repository->all();
        return response()->json($data);
    }
}