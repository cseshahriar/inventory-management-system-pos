<?php

namespace App\Http\Controllers;

use Image;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller 
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
        $customers = Customer::all(); 
        return view('customer.index', compact('customers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');  
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
            'name' => 'required|string',
            'email' => 'required|unique:customers,email|max:255',
            'phone' => 'required|unique:customers,phone|regex:/(01)[0-9]{9}/', 
            'address' => 'required|string',
            'shopname' => 'nullable|string',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',          
            'account_holder' => 'nullable|string', 
            'account_number' => 'nullable|numeric', 
            'bank_name' => 'nullable|string', 
            'bank_brance' => 'nullable|string', 
            'city' => 'required|string',   
        ]);

        $customer = new Customer;

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname; 
        $customer->account_holder = $request->account_holder; 
        $customer->account_number = $request->account_number; 
        $customer->bank_name = $request->bank_name; 
        $customer->bank_brance = $request->bank_brance;  

        // image upload 
        if ($request->hasFile('photo')) { 
            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension(); 
            //$localtion = public_path('images/customer/'.$imgName);          
            $img_url =  'public/images/customer/'.$imgName;    
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $customer->photo = $img_url;         
        }

        $customer->city = $request->city; 

        $customer->save();  

        if ($customer->save()) {  
            
            $notification = array(
                'message' => 'Customer Added Successfully', 
                'alert-type' => 'success' 
            );

            return redirect()->back()->with($notification);    

        } else {
            return redirect()->back();     
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $customer = Customer::find($id);  
        return view('customer.show', compact('customer')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));   
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|max:255|unique:customers,email,'.$id,
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:customers,phone,'.$id, 
            'address' => 'required|string', 
            'shopname' => 'nullable|string',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',          
            'account_holder' => 'nullable|string', 
            'account_number' => 'nullable|numeric', 
            'bank_name' => 'nullable|string', 
            'bank_brance' => 'nullable|string', 
            'city' => 'required|string',      
        ]);

        $customer = Customer::find($id); 

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname; 
        $customer->account_holder = $request->account_holder; 
        $customer->account_number = $request->account_number; 
        $customer->bank_name = $request->bank_name; 
        $customer->bank_brance = $request->bank_brance;  

        // image upload 
        if ($request->hasFile('photo')) { 

             // delete old image file 
            if (File::exists($customer->photo)) {     
                File::delete($customer->photo);  
            }

            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension(); 
            //$localtion = public_path('images/customer/'.$imgName);          
            $img_url =  'public/images/customer/'.$imgName;    
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $customer->photo = $img_url;         
        }

        $customer->city = $request->city;  

        $customer->save();  

        if ($customer->save()) {  
            
            $notification = array(
                'message' => 'Customer Updated Successfully', 
                'alert-type' => 'success' 
            );

            return redirect()->route('customer.index')->with($notification);    

        } else {
            return redirect()->back();     
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!is_null($customer)) {
            
            // delete image file 
            if (File::exists($customer->photo)) { 
                File::delete($customer->photo);    
            } 

            // unlink($employee->photo);
            
           $delete = $customer->delete();

             if ($delete) {   
                
                $notification = array(
                    'message' => 'Customer Deleted Successfully', 
                    'alert-type' => 'success'  
                );

                return redirect()->route('customer.index')->with($notification);      

            } else {
                return redirect()->back();     
            }
        }

    }

}
