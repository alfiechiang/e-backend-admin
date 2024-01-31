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
        Schema::create('shopp_carts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->comment('會員ID');
            $table->integer('product_id')->comment('商品ID');
            $table->integer('num')->comment('商品數量');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopp_carts');
    }
};
