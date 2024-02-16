<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->truncate();
        $insertData=[
            ['customer_id'=>1,'order_number'=>'CXN0005','amount'=>1000,'deliver_area'=>'Taichung','pay_type'=>1,'order_status'=>1,'order_status'=>1,'delivery_fee'=>200,'delivery_fee_cost'=>200],
            ['customer_id'=>1,'order_number'=>'CXN0006','amount'=>1000,'deliver_area'=>'Taichung','pay_type'=>1,'order_status'=>1,'order_status'=>1,'delivery_fee'=>200,'delivery_fee_cost'=>200],
            ['customer_id'=>1,'order_number'=>'CXN0007','amount'=>1000,'deliver_area'=>'Taichung','pay_type'=>1,'order_status'=>1,'order_status'=>1,'delivery_fee'=>200,'delivery_fee_cost'=>200],
            ['customer_id'=>1,'order_number'=>'CXN0008','amount'=>1000,'deliver_area'=>'Taichung','pay_type'=>1,'order_status'=>1,'order_status'=>1,'delivery_fee'=>200,'delivery_fee_cost'=>200],
            ['customer_id'=>1,'order_number'=>'CXN0009','amount'=>1000,'deliver_area'=>'Taichung','pay_type'=>1,'order_status'=>1,'order_status'=>1,'delivery_fee'=>200,'delivery_fee_cost'=>200]
        ];

        Order::insert($insertData);

    }
}
