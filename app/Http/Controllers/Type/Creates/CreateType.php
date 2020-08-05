<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/7/2020
 * Time: 11:57 AM
 */

namespace App\Http\Controllers\Type\Creates;


use App\Type;
use App\Http\Resources\Type as TypeResources;
use Illuminate\Http\Request;

class CreateType
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

    public function create(Request $request)
    {
        $model = $this->repository->create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'size' => $request->input('size'),
            'description' => $request->input('description'),
            'remark' => $request->input('remark'),
        ]);

        return $model;
    }


}