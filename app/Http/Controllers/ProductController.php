<?php

namespace App\Http\Controllers;

use Image;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Imports\ProductsImport; 
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;  
use Illuminate\Support\Facades\File;  

class ProductController extends Controller  
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'product_godown' => 'required', 
            'product_route' => 'required|string',
            'bye_date' => 'required|string',
            'expire_date' => 'required|string',
            'product_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',     
            'buying_price' => 'required|numeric',     
            'selling_price' => 'required|numeric',  
            'status' => 'required|numeric',  
        ]);

        $product = new Product;

        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_godown = $request->product_godown;
        $product->product_route = $request->product_route;   


        $product->bye_date = $request->bye_date; 
        $product->expire_date = $request->expire_date; 
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;  
        
        // image upload 
        if ($request->hasFile('product_image')) { 
            $image = $request->file('product_image');   
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            // $localtion = public_path('images/product/'.$imgName);     
            $img_url =  'public/images/product/'.$imgName;
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $product->product_image = $img_url;        
        }

        $product->save();  

        if ($product->save()) { 
            
            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('product.index')->with($notification);  

        } else {
            return redirect()->back();    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'product_godown' => 'required', 
            'product_route' => 'required|string',
            'bye_date' => 'required|string',
            'expire_date' => 'required|string',
            'product_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',     
            'buying_price' => 'required|numeric',     
            'selling_price' => 'required|numeric',  
            'status' => 'required|numeric',  
        ]);

        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_godown = $request->product_godown;     
        $product->product_route = $request->product_route;   


        $product->bye_date = $request->bye_date; 
        $product->expire_date = $request->expire_date; 
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;   
        
        // image upload 
        if ($request->hasFile('product_image')) { 
            $image = $request->file('product_image');   
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            // $localtion = public_path('images/product/'.$imgName);     
            $img_url =  'public/images/product/'.$imgName; 
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $product->product_image = $img_url;        
        }

        $product->save();  

        if ($product->save()) { 
            
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('product.index')->with($notification);  

        } else {
            return redirect()->back();    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = Product::find($id);

        if (!is_null($product)) {
            
            // delete image file 
            if (File::exists($product->photo)) { 
                File::delete($product->photo);    
            } 

            // unlink($employee->photo);
            
            $delete = $product->delete();  
            
            if ( $delete ) { 
                
                  $notification = array(
                    'message' => 'Product Deleted Successfully',
                    'alert-type' => 'success' 
                );

                return redirect()->back()->with($notification);  

            } else {
                return redirect()->back();    
            }
        }
    }


    public function productImport()
    {
        return view('product.import'); 
    }

    public function import(Request $request) 
    {
        $import = Excel::import(new ProductsImport, $request->file('import_file')); 
        
         if ( $import ) { 
            
            $notification = array(
                'message' => 'Products Import Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('product.index')->with($notification);  

        } else {
            return redirect()->back();      
        }
       
    }

    /**
     * [export products]
     * @return [xlsx] [all product exports]
     */
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');  
    }

}
