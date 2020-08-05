<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/7/2020
 * Time: 12:02 PM
 */

namespace App\Http\Controllers\Category\Updates;

use App\Category;
use App\Http\Resources\Category as CategoryResources;
use Illuminate\Http\Request;

class UpdateCategory
{
    /** @var  Category */
    private $repository;

    /**
     * ListCategory constructor.
     * @param Category $repository
     */
    public function __construct(Category $repository)
    {
        $this->repository = $repository;
    }

    public function updates($id, Request $request)
    {
        $data = $this->repository->findOrFail($id);

        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->remark = $request->input('remark');

        if($data->save()){
            return $data;
        }
    }
}