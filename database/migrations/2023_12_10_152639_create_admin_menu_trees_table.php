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
        Schema::create('admin_menu_trees', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('root')->comment('是否為始祖');
            $table->integer('ancestor')->comment("祖先");
            $table->integer('descendant')->comment("子孫");
            $table->integer('distance')->comment("距離");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_menu_trees');
    }
};
