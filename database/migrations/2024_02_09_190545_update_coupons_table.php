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
        Schema::table('coupons', function (Blueprint $table) {
            $table->after('value',function (Blueprint $table){
                $table->enum('type',array('value','per'))->default('value');
                $table->integer('min_order_amt')->nullable();
                $table->integer('is_one_time')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('coupons',[
            'type','min_order_amt','is_one_time'
        ]);
    }
};
