<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'type', 'shop', 'photo','account_holder', 'account_number', 'bank_name', 'brance_name', 'city'];  

     public function sproducts()
    {
    	return $this->hasMany(Product::class);  
    }
}
