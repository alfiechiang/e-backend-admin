<?php

namespace App\Http\Services\Admin;

use App\Http\Dao\Admin\MenuDao;
use App\Http\Dao\Admin\ProductCategoryDao;
use App\Http\Dao\Admin\ProductDao;
use Illuminate\Support\Facades\Auth;

class ProductService{


    protected ProductDao $productDao;

    public function __construct(ProductDao $productDao)
    {
        $this->productDao=$productDao;
    }

    public function create(array $data){
        $this->productDao->create($data);
    }

    public function pageList(array $data){
        return $this->productDao->pageList($data);
    }

    public function findone(int $category_id){
        return $this->productDao->findone($category_id);
    }

    public function update(array $data,int $category_id){
        return $this->productDao->update($data,$category_id);
    }

}
