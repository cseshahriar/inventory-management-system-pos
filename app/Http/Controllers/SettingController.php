<?php

namespace App\Http\Controllers; 

use DB;
use Image; 
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);  
        return view('setting.index', compact('setting'));         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)   
    {
        $this->validate($request, [
            'company_name' => 'required|string', 
            'company_address' => 'required|string',
            'company_email' => 'required|string',
            'company_phone' => 'required|numeric',
            'company_logo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'company_mobile' => 'required|numeric',
            'company_city' => 'required|string',
            'company_country' => 'required|string',
            'company_zipcode' => 'required|numeric'    
        ]);    

        $setting = Setting::find($id);
        $setting->company_name = $request->company_name;
        $setting->company_address = $request->company_address; 
        $setting->company_email = $request->company_email;
        $setting->company_phone = $request->company_phone;
        $setting->company_mobile = $request->company_mobile; 
        $setting->company_city = $request->company_city; 
        $setting->company_country = $request->company_country; 
        $setting->company_zipcode = $request->company_zipcode;   

          // image upload 
        if ($request->hasFile('company_logo')) { 
            $image = $request->file('company_logo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            $localtion = public_path('images/company/'.$imgName);     
            $img_url =  'public/images/company/'.$imgName;
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $setting->company_logo = $img_url;           
        }

        $setting->save(); 

        if ($setting->save()) { 
            
            $notification = array(
                'message' => 'Settings Updated Successfully', 
                'alert-type' => 'success' 
            );

            return redirect()->route('setting.index')->with($notification);       

        } else {
            return redirect()->back();     
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
