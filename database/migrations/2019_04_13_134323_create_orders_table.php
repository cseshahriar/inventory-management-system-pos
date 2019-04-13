<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('order_date');
            $table->integer('order_status');
            $table->integer('total_products');  
            $table->decimal('sub_total');
            $table->decimal('tax'); 
            $table->decimal('total'); 
            $table->decimal('pay')->nullable(); 
            $table->decimal('due')->nullable();  
            $table->integer('payment_status');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
