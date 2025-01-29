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
        Schema::table('categories', function (Blueprint $table) {
            $table->after('category_slug',function(Blueprint $table){
                $table->string('parent_category_id',10);
                $table->string('category_image')->nullable();
            });
            $table->integer('is_home')->default(0)->after('category_order');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['parent_category_id','category_image','is_home']);
        });
    }
};
