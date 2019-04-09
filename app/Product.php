<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'supplier_id', 'product_name', 'product_code', 'product_godown', 'product_route', 'product_image', 'bye_date', 'expire_date', 'buying_price', 'selling_price', 'status'];
    
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }
}
