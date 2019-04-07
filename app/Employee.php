<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'experience', 'photo', 'nid', 'salary', 'vacation', 'city']; 

     public function salary()
     {
     	return $this->hasOne(Salary::class);  
     } 
}
