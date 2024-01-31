<?php

namespace App\Http\Services\Admin;

use App\Http\Dao\Admin\MenuDao;
use App\Http\Dao\Admin\ProductCategoryDao;
use App\Http\Dao\Admin\ProductImgDao;
use Illuminate\Support\Facades\Auth;

class ProductImgService{


    protected ProductImgDao $productImgDao;

    public function __construct(ProductImgDao $productImgDao)
    {
        $this->productImgDao=$productImgDao;
    }

    public function create(array $data){
        $this->productImgDao->create($data);
    }

    public function list(array $data){
        return $this->productImgDao->list($data);
    }

    public function findone(int $img_id){
        return $this->productImgDao->findone($img_id);
    }

    public function update(array $data,int $img_id){
        return $this->productImgDao->update($data,$img_id);
    }

}
