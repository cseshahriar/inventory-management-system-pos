<?php

namespace App\Http\Controllers;

use DB; 
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
        $this->validate($request, [
            'customer_id' => 'required|numeric'
        ], [
            'customer_id.required' => 'Please select a customer first!'  
        ]);

        $carts = Cart::content(); 
        
        $customer_id = $request->customer_id; 
        $customer = Customer::find($customer_id);

        return view('pos.invoice', compact('carts', 'customer')); 
    }

    public function finalInvoice(Request $request)
    {
         $this->validate($request, [
            'payment_status' => 'required'
        ], [
            'payment_status.required' => 'Please your payment first!'  
        ]);

        // orders 
        $data = array();
        $data['customer_id'] = $request->customer_id; 
        $data['order_date'] = $request->order_date; 
        $data['order_status'] = $request->order_status; 
        $data['total_products'] = $request->total_products;   
        $data['sub_total'] = $request->sub_total; 
        $data['tax'] = $request->tax; 
        $data['total'] = $request->total; 
        $data['payment_status'] = $request->payment_status; 
        $data['pay'] = $request->pay; 
        $data['due'] = $request->due;  
        $order_id = DB::table('orders')->insertGetId($data);   


        // cart details 
        $cartData = array();

        foreach (Cart::content() as $value) {
            $cartData['order_id'] = $order_id;   
            $cartData['product_id'] = $value->id; 
            $cartData['quantity'] = $value->qty; 
            $cartData['unitcost'] = $value->qty;  
            $cartData['total'] = $value->total;

            $insert = DB::table('orderdetails')->insert($cartData);    
        }

        if ($insert) {  
            
            $notification = array(
                'message' => 'Successfully invoice created | Please delevery the products and accept status', 
                'alert-type' => 'success'  
            );

            Cart::destroy();

            return redirect()->route('home')->with($notification);   

        } else {
             $notification = array(
                'message' => 'Opps! Something went wrong', 
                'alert-type' => 'error'   
            );
            return redirect()->back();       
        }
    }

}
