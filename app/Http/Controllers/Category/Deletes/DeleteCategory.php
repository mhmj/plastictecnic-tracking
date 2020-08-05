<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/7/2020
 * Time: 12:01 PM
 */

namespace App\Http\Controllers\Category\Deletes;

use App\Category;
use App\Http\Resources\Category as CategoryResources;

class DeleteCategory
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

    public function delete($id)
    {
        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return new CategoryResources($data);
        }
    }
}