<?php

namespace App\Http\Dao\Admin;

use App\Models\ProductCategory;

class ProductCategoryDao{

    public function create(array $data){

        ProductCategory::create([
            'name' =>$data['name']
        ]);
    }

    public function pageList(array $data){
        $Builder = new  ProductCategory();
        if(isset($data['name'])){
            $Builder =$Builder->where('name',$data['name']);
        }

        return $Builder->paginate($data['per_page']);
    }

    public function list(array $data){
        $Builder = new  ProductCategory();
        if(isset($data['name'])){
            $Builder =$Builder->where('name',$data['name']);
        }

        return $Builder->get();
    }

    public function findone(int $category_id){
        return ProductCategory::where('id',$category_id)->first();
    }

    public function update(array $data,int $category_id){
        $category= ProductCategory::where('id',$category_id)->first();
        $category->fill($data);
        $category->save();
    }


}
