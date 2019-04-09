<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cat_name', 'cat_slug', 'category_id', 'status'];  
    
   // every category has one parent category  
    public function parent()  
    {
    	return $this->belongsTo(Category::class, 'category_id');     
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
