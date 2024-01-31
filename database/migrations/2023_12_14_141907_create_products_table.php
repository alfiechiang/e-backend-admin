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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('product_name')->comment('商品名稱');
            $table->integer('price')->comment('商品價格');
            $table->string('product_number')->comment('商品編號');
            $table->integer('stock_num')->comment('商品庫存');
            $table->string('desc')->comment('商品描述');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
