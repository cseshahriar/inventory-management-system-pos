<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->string('product_name'); 
            $table->string('product_code');
            $table->string('product_godown');
            $table->string('product_route');
            $table->string('product_image'); 
            $table->date('bye_date');
            $table->date('expire_date');
            $table->decimal('buying_price'); 
            $table->decimal('selling_price'); 
            $table->tinyInteger('status')->default(0);   
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
        Schema::dropIfExists('products');
    }
}
