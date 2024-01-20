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
        Schema::create('products_attr', function (Blueprint $table) {
            $table->id();
            $table->integer('products_id');
            $table->string('sku',255);
            $table->string('attr_image',255);
            $table->double('mrp',8,2);
            $table->double('price',8,2);
            $table->double('qty',8,2);
            $table->integer('size_id');
            $table->integer('color_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_attr');
    }
};
