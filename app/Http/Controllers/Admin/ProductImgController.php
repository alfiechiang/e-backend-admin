<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response;
use App\Http\Services\Admin\ProductImgService;
use App\Http\Services\UploadImageService;

class ProductImgController extends Controller
{
    protected  $productImgService;

    protected $uploadImageService;

    public function __construct(ProductImgService $productImgService,UploadImageService $uploadImageService)
    {
        $this->productImgService=$productImgService;
        $this->uploadImageService=$uploadImageService;
    }
    
    public function create(Request $request){

        $product_id=$request->product_id;
        $file=$request->file('file');
        $result=$this->uploadImageService->exec($file);
        $img_url=$result['img_url'];
        $fileName=$result['fileName'];

        $this->productImgService->create(['product_id'=>$product_id,'img_url'=>$img_url]);
        return Response::format(200,['img_url'=>$img_url,'fileName'=>$fileName],'請求成功');
    }

    public function list(Request $request){
        $res=$this->productImgService->list($request->all());
        return Response::format(200,$res,'請求成功');
    }

    public function findone(int $category_id){
        $res=$this->productImgService->findone($category_id);
        return Response::format(200,$res,'請求成功');
    }

    public function update(Request $request,int $category_id){
        $this->productImgService->update($request->all(),$category_id);
        return Response::format(200,[],'請求成功');
    }
}
