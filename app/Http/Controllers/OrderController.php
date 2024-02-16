<?php

namespace App\Http\Controllers;

use App\Http\Response;
use App\Http\Services\Admin\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService=$orderService;
    }

    public function list(Request $request){
        $res= $this->orderService->pageOrderList($request->all());
        return Response::format(200,$res,'請求成功');
    }

}
