<?php

namespace App\Http\Controllers;

use Cart;
use Image;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class CartController extends Controller 
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  
    {
        $product = Cart::add($request->all());
       
        if ($product) {   
            
            $notification = array(
                'message' => 'Product Successfully Added',
                'alert-type' => 'success' 
            );
            return redirect()->back()->with($notification);      
        } else {
           $notification = array(
                'message' => 'Oppos!, Something wend wrong.',
                'alert-type' => 'error'  
            );
            return redirect()->back()->with($notification);   
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $update = Cart::update($id, $request->qty); 

        if ($update) {    
            
            $notification = array(
                'message' => 'Product Quantity has updated.',
                'alert-type' => 'success' 
            );
            return redirect()->back()->with($notification);       
        } else {
           $notification = array(
                'message' => 'Oppos!, Something wend wrong.',
                'alert-type' => 'error'  
            );
            return redirect()->back()->with($notification);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId) 
    {
        $remove = Cart::remove($rowId); 

         if ($remove) {    
            
            $notification = array(
                'message' => 'Product has removed.',
                'alert-type' => 'success' 
            );

            return redirect()->back()->with($notification);    

        } else {

           $notification = array(
                'message' => 'Oppos!, Something wend wrong.',
                'alert-type' => 'error'  
            );
           
            return redirect()->back()->with($notification);   
        }
    } 

    /**
     * [invoice description]
     * @return [type] [description]
     */
    public function invoice(Request $request)
    {
        // $carts = Cart::content(); 
        $customer_id = $request->customer_id; 
        dd($customer_id);
    }

}
