<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('category_id', 'supplier_id', 'product_name', 'product_code', 'product_godown', 'product_route', 'product_image', 'bye_date', 'expire_date', 'buying_price', 'selling_price', 'status')->get();  
    }

    public function import() 
    {

    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx'); 
    }

}
