<?php

namespace App\Http\Controllers;

use Image; 
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all(); 
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'name' => 'required',
            'email' => 'required|unique:employees,email|max:255',
            'phone' => 'required|unique:employees,phone|regex:/(01)[0-9]{9}/', 
            'address' => 'required|string',
            'type' => 'nullable|string',
            'shop' => 'nullable|string',
            'photo' => 'required|mimes:jpeg,jpg,png,gif|max:2048',         
            'account_holder' => 'nullable|string',  
            'account_number' => 'nullable|numeric', 
            'bank_name' => 'nullable|string', 
            'brance_name' => 'nullable|string', 
            'city' => 'required|string',   
        ]);

        $supplier = new Supplier;

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->shop = $request->shop; 

        // image upload 
        if ($request->hasFile('photo')) { 
            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            $localtion = public_path('images/supplier/'.$imgName);      
            $img_url =  'public/images/supplier/'.$imgName;  
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $supplier->photo = $img_url;         
        }

        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->brance_name = $request->brance_name; 
        $supplier->city = $request->city;

        $supplier->save();  

        if ($supplier->save()) { 
            
            $notification = array(
                'message' => 'Supplier Added Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('supplier.index')->with($notification);  

        } else {
            return redirect()->back();    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.show', compact('supplier'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|max:255|unique:employees,email,'.$id,
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:employees,phone,'.$id, 
            'address' => 'required|string', 
            'type' => 'nullable|string',
            'shop' => 'nullable|string',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',          
            'account_holder' => 'nullable|string',  
            'account_number' => 'nullable|numeric', 
            'bank_name' => 'nullable|string', 
            'brance_name' => 'nullable|string', 
            'city' => 'required|string',   
        ]);

        $supplier = Supplier::find($id);

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->shop = $request->shop; 

        // image upload 
        if ($request->hasFile('photo')) { 

            // delete old image file 
            if (File::exists($supplier->photo)) {     
                File::delete($supplier->photo);   
            }

            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            // $localtion = public_path('images/supplier/'.$imgName);        
            $img_url =  'public/images/supplier/'.$imgName;  
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $supplier->photo = $img_url;         
        }

        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->brance_name = $request->brance_name; 
        $supplier->city = $request->city;

        $supplier->save();  

        if ($supplier->save()) { 
            
            $notification = array(
                'message' => 'Supplier Updated Successfully', 
                'alert-type' => 'success' 
            );

            return redirect()->route('supplier.index')->with($notification);  

        } else {
            return redirect()->back();      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $supplier = Supplier::find($id);

        if (!is_null($supplier)) {
            
            // delete image file 
            if (File::exists($supplier->photo)) { 
                File::delete($supplier->photo);    
            } 

            // unlink($employee->photo);
            
            $delete = $supplier->delete();
            
            if ( $delete ) { 
                
                  $notification = array(
                    'message' => 'Supplier Deleted Successfully',
                    'alert-type' => 'success'  
                );

                return redirect()->back()->with($notification);  

            } else {
                return redirect()->back();     
            } 
        }
    }
}
