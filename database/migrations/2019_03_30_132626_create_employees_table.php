<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 48);
            $table->string('email', 255)->unique();
            $table->string('phone', 15)->unique()->comment('phone number formate is 11 digit');  
            $table->string('address');
            $table->string('experience')->nullable(); 
            $table->string('photo')->nullable();
            $table->string('nid', 20)->unique();    
            $table->string('salary');
            $table->string('vacation')->nullable();
            $table->string('city');
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
        Schema::dropIfExists('employees');
    }
}
