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
        Schema::table('products', function (Blueprint $table) {
            $table->after('warranty',function(Blueprint $table){
                $table->string('lead_time')->nullable();
                $table->string('tax')->nullable();
                $table->string('tax_type')->nullable();
                $table->integer('is_promo')->nullable();
                $table->integer('is_featured')->nullable();
                $table->integer('is_discounted')->nullable();
                $table->integer('is_tranding')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('products',[
            'lead_time','tax','tax_type','is_promo','is_featured','is_discounted','is_tranding',
        ]);
    }
};
