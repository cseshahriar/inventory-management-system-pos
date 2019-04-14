<?php

namespace App\Http\Controllers;

use DB; 
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name', 'orders.*')
        ->where('order_status', 'Pending')
        ->orWhere('order_status', 'pending')   
        ->get();  
        return view('order.index', compact('orders'));       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function successShow($id) 
    { 
        $order = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.*', 'orders.*', 'orders.id as oid')   
        ->where('orders.id', $id)
        ->first(); 

        $orderDetails  = DB::table('orderdetails')
        ->join('products', 'orderdetails.product_id', 'products.id')
        ->select('orderdetails.*', 'products.product_name', 'products.product_code') 
        ->where('order_id', $id)->get();       

        return view('order.success-show', compact('order', 'orderDetails'));    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $order = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.*', 'orders.*', 'orders.id as oid')   
        ->where('orders.id', $id)
        ->first(); 

        $orderDetails  = DB::table('orderdetails')
        ->join('products', 'orderdetails.product_id', 'products.id')
        ->select('orderdetails.*', 'products.product_name', 'products.product_code') 
        ->where('order_id', $id)->get();       

        return view('order.show', compact('order', 'orderDetails'));  

    }

    public function done($id)
    {
        $approve = DB::table('orders')->where('id', $id)->update(['order_status' => 'Success']);  

        if ( $approve ) {  
            
            $notification = array(
                'message' => 'Successfully Order Confirmed ! And All Products Delevered',
                'alert-type' => 'success'  
            );

            return redirect()->route('pending.order')->with($notification);  

        } else {
            return redirect()->back();      
        }

    }

    public function success()
    {
        $orders = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name', 'orders.*')
        ->where('order_status', 'Success')
        ->orWhere('order_status', 'success') 
        ->get();  
        return view('order.success', compact('orders'));  
    }
}
