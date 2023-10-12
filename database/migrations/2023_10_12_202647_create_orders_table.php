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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate() ;
            $table->string('user_name');
            $table->string('user_address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->enum('payment_method',['cash','visa'])->default('cash');
            $table->enum('order_status', ['Awaiting_Approval','pending', 'delivered', 'cancelled']);
            $table->decimal('total', 10, 2);  
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
