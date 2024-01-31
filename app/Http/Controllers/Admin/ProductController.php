<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response;
use App\Http\Services\Admin\ProductService;

class ProductController extends Controller
{
    protected  $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }
    
    public function create(Request $request){
        $this->productService->create($request->all());
        return Response::format(200,[],'請求成功');
    }

    public function pageList(Request $request){
        $res=$this->productService->pageList($request->all());
        return Response::format(200,$res,'請求成功');
    }

    public function findone(int $category_id){
        $res=$this->productService->findone($category_id);
        return Response::format(200,$res,'請求成功');
    }

    public function update(Request $request,int $category_id){
        $this->productService->update($request->all(),$category_id);
        return Response::format(200,[],'請求成功');
    }
    
}
