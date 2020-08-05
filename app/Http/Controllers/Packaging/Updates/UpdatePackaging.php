<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/7/2020
 * Time: 8:51 AM
 */

namespace App\Http\Controllers\Packaging\Updates;


use App\Packaging;
use Illuminate\Http\Request;

class UpdatePackaging
{
    /** @var  Packaging */
    private $repository;

    /**
     * UpdatePackaging constructor.
     * @param Packaging $repository
     */
    public function __construct(Packaging $repository)
    {
        $this->repository = $repository;
    }

    public function updates($id, Request $request)
    {
        $data = $this->repository->findOrFail($id);

        $data->type_name = $request->input('type_name');
        $data->category_id = $request->input('category_id');
        $data->packaging_no = $request->input('packaging_no');
        $data->status = $request->input('status');
        $data->remark = $request->input('remark');
        $data->remark_2 = $request->input('remark_2');
        $data->image = $request->input('image');
        $data->company_id = $request->input('company_id');


        if($data->save()){
            return $data;
        }
    }


}