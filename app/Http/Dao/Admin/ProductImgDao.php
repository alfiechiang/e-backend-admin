<?php

namespace App\Http\Dao\Admin;

use App\Models\ProductImg;

class ProductImgDao{

    public function create(array $data){

        ProductImg::create([
            'product_id'=>$data['product_id'],
            'img_url'=>$data['img_url']           
        ]);
    }

    public function update(array $data,int $img_id){

        $img =ProductImg::where('id',$img_id)->first();
        $img->fill($data);
        $img->save();
    }

    public function findone(int $img_id){
        return ProductImg::where('id',$img_id)->first();
    }

    public function list(array $data){
        $Builder = new  ProductImg();
        return $Builder->where('product_id',$data['product_id'])->get();
    }
}