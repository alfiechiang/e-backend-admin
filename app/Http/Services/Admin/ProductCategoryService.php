<?php

namespace App\Http\Services\Admin;

use App\Http\Dao\Admin\MenuDao;
use App\Http\Dao\Admin\ProductCategoryDao;
use Illuminate\Support\Facades\Auth;

class ProductCategoryService{


    protected ProductCategoryDao $productCategoryDao;

    public function __construct(ProductCategoryDao $productCategoryDao)
    {
        $this->productCategoryDao=$productCategoryDao;
    }

    public function create(array $data){
        $this->productCategoryDao->create($data);
    }

    public function pageList(array $data){
        if(isset($data['per_page'])){
            return $this->productCategoryDao->pageList($data);
        }else{
            return $this->productCategoryDao->list($data);
        }
    }

    public function findone(int $category_id){
        return $this->productCategoryDao->findone($category_id);
    }

    public function update(array $data,int $category_id){
        return $this->productCategoryDao->update($data,$category_id);
    }

}
