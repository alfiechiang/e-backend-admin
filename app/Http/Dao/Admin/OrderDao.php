<?php

namespace App\Http\Dao\Admin;

use App\Models\Order;

class OrderDao{

    public function pageOrderList(array $data){
        $builder = new Order();
        if(isset($data['order_number'])){
            $builder = $builder->where('order_number',$data['order_number']);
        }
       return $builder->paginate($data['per_page']);
    }

}
