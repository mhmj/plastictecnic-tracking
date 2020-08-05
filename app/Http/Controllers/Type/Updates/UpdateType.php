<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/7/2020
 * Time: 11:59 AM
 */

namespace App\Http\Controllers\Type\Updates;

use App\Type;
use App\Http\Resources\Type as TypeResources;
use Illuminate\Http\Request;

class UpdateType
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

    public function updates($id, Request $request)
    {
        $data = $this->repository->findOrFail($id);

        $data->category_id = $request->input('category_id');
        $data->name = $request->input('name');
        $data->size = $request->input('size');
        $data->description = $request->input('description');
        $data->color = $request->input('color');
        $data->remark = $request->input('remark');

        if($data->save()){
            return $data;
        }
    }
}