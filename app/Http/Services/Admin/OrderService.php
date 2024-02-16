<?php

namespace App\Http\Services\Admin;

use App\Http\Dao\Admin\MenuDao;
use App\Http\Dao\Admin\OrderDao;
use Illuminate\Support\Facades\Auth;

class OrderService{


    protected OrderDao $orderDao;

    public function __construct(OrderDao $orderDao)
    {
        $this->orderDao=$orderDao;
    }

    public function pageOrderList(array $data){
        return $this->orderDao->pageOrderList($data);
    }





}
