<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 10:41 AM
 */

namespace App\Http\Controllers\Personnel\User\Updates;

use App\User;
use App\Http\Resources\User as UserResources;
use Illuminate\Http\Request;

class UpdateUser
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

    public function update($id, Request $request)
    {
        $data = $this->repository->findOrFail($id);

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone_no = $request->input('phone_no');
        $data->role = $request->input('role');
        $data->company_id = $request->input('company_id');
        $data->remark = $request->input('remark');

        if($data->save()){
            return $data;
        }
    }

}