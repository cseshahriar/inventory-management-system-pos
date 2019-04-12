<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel; 

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id' =>$row[0], 
            'supplier_id' =>$row[1], 
            'product_name' =>$row[2],
            'product_code' =>$row[3], 
            'product_godown' =>$row[4], 
            'product_route' =>$row[5], 
            'product_image' =>$row[6], 
            'bye_date' =>$row[7], 
            'expire_date' =>$row[8], 
            'buying_price' =>$row[9], 
            'selling_price' =>$row[10]   
        ]); 
    }
}
