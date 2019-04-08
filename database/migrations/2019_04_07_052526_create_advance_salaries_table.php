<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceSalariesTable extends Migration  
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {
        Schema::create('advancesalaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('month');
            $table->string('year'); 
            $table->decimal('advance_salary')->nullable();  
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
        Schema::dropIfExists('advancesalaries');
    }
}
