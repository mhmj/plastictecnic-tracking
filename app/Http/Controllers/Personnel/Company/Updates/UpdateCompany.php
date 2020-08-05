<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 10:38 AM
 */

namespace App\Http\Controllers\Personnel\Company\Updates;

use App\Company;
use App\Http\Resources\Company as CompanyResources;
use Illuminate\Http\Request;

class UpdateCompany
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

    public function update($id, Request $request)
    {
        $data = $this->repository->findOrFail($id);

        $data->name = $request->input('name');
        $data->registration_no = $request->input('registration_no');
        $data->address = $request->input('address');
        $data->post_code = $request->input('post_code');
        $data->state = $request->input('state');
        $data->phone_no = $request->input('phone_no');
        $data->location = $request->input('location');
        $data->email = $request->input('email');
        $data->remark = $request->input('remark');

        if($data->save()){
            return $data;
        }
    }
}