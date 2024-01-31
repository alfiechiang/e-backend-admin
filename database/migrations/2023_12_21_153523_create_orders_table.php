<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->comment('會員ID');
            $table->string('order_number')->comment('訂單編號');
            $table->integer('amount')->comment('金額');
            $table->string('deliver_area')->comment('配送區域');
            $table->tinyInteger('pay_type')->comment('支付方式');
            $table->tinyInteger('order_status')->comment('訂單狀態');
            $table->integer('delivery_fee')->comment('運費');
            $table->integer('delivery_fee_cost')->comment('運費折抵');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
