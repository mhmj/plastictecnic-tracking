<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/7/2020
 * Time: 12:00 PM
 */

namespace App\Http\Controllers\Category\Creates;

use App\Category;
use App\Http\Resources\Category as CategoryResources;
use Illuminate\Http\Request;

class CreateCategory
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

    public function create(Request $request)
    {
        $model = $this->repository->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'remark' => $request->input('remark'),
        ]);

        return $model;
    }
}