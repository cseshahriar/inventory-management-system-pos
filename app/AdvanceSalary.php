<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model 
{
	protected $table = 'advancesalaries';
	
     protected $fillable = ['employee_id', 'month', 'year', 'salary', 'advance_salary', 'status']; 


     public function employee()
     {
     	return $this->belongsTo(Employee::class);   
     }  
}
