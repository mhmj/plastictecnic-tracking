<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/7/2020
 * Time: 10:39 AM
 */

namespace App\Http\Controllers\Personnel\User\Creates;


use App\User;
use App\Http\Resources\User as UserResources;
use Illuminate\Http\Request;

class CreateUser
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

    public function create(Request $request)
    {
        $model = $this->repository->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'role' => $request->input('role'),
            'company_id' => $request->input('company_id'),
            'password' => '$2y$10$GYsXiibGBQVsKDJXbzyvQ.AoCky/T/r251TQwciROy3G9f4dU/x3.',
            'remark' => $request->input('remark'),
        ]);
        return $model;
    }


}