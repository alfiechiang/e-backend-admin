<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Response;
use App\Http\Services\Admin\ProductCategoryService;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProductCategoryController extends Controller
{

    protected ProductCategoryService $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService=$productCategoryService;
    }
    
    public function create(Request $request){
        $this->productCategoryService->create($request->all());
        return Response::format(200,[],'請求成功');
    }

    public function pageList(Request $request){
        $res=$this->productCategoryService->pageList($request->all());
        return Response::format(200,$res,'請求成功');
    }

    public function findone(int $category_id){
        $res=$this->productCategoryService->findone($category_id);
        return Response::format(200,$res,'請求成功');
    }

    public function update(Request $request,int $category_id){
        $this->productCategoryService->update($request->all(),$category_id);
        return Response::format(200,[],'請求成功');
    }

}