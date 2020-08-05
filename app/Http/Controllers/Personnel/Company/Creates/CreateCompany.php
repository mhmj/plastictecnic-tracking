<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 10:37 AM
 */

namespace App\Http\Controllers\Personnel\Company\Creates;

use App\Company;
use App\Http\Resources\Company as CompanyResources;
use Illuminate\Http\Request;

class CreateCompany
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

    public function create(Request $request)
    {
            $model = $this->repository->create([
                'name' => $request->input('name'),
                'registration_no' => $request->input('registration_no'),
                'address' => $request->input('address'),
                'post_code' => $request->input('post_code'),
                'state' => $request->input('state'),
                'phone_no' => $request->input('phone_no'),
                'fax_no' => $request->input('fax_no'),
                'location' => $request->input('location'),
                'email' => $request->input('email'),
                'remark' => '-',
            ]);
            return $model;
    }
}