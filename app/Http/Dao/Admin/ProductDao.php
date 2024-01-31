<?php

namespace App\Http\Dao\Admin;

use App\Models\AdminMenu;
use App\Models\AdminMenuRole;
use App\Models\AdminMenuTree;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductDao{

    public function create(array $data){


        Product::create([
            'category_id'=>$data['category_id'],
            'product_name'=>$data['product_name'],
            'price'=>$data['price'],
            'product_number'=>$data['product_number'],
            'stock_num'=>$data['stock_num'],
            'desc'=>$data['desc']
        ]);
    }

    public function update(array $data,int $product_id){

        $product =Product::where('id',$product_id)->first();
        $product->fill($data);
        $product->save();
    }

    public function findone(int $product_id){
        return Product::where('id',$product_id)->first();
    }

    public function pageList(array $data){
        $Builder = new  Product();

        if(isset($data['product_name'])){
            $Builder=$Builder->where('product_name',$data['product_name']);
        }

        if(isset($data['product_number'])){
            $Builder=$Builder->where('product_number',$data['product_number']);
        }
        return $Builder->paginate($data['per_page']);
    }
   
}