<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
     protected $fillable = ['employee_id', 'month', 'year', 'salary', 'advance_salary', 'status']; 


     public function employee()
     {
     	return $this->belongsTo(Employee::class);   
     }  
}
