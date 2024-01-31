<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Response;
use App\Http\Services\UploadImageService;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{


    protected UploadImageService $uploadImageService;

    public function __construct(UploadImageService $uploadImageService)
    {
        $this->uploadImageService=$uploadImageService;
    }


    public function exec(Request $request){


        $file=$request->file('file');

        $url=$this->uploadImageService->exec($file);

        return Response::format(200,['url'=>$url],'請求成功');
    }
    
   

}