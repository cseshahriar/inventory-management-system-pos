<?php

namespace App\Http\Controllers;

use Image; 
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
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
        $employees = Employee::all();  
        return view('employee.index', compact('employees')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create'); 
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
            'experience' => 'required|string',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',     
            'nid' => 'required|numeric|unique:employees,nid',     
            'salary' => 'required|numeric',  
            'vacation' => 'required|string', 
            'city' => 'required|string', 
        ]);

        $emplyee = new Employee;

        $emplyee->name = $request->name;
        $emplyee->email = $request->email;
        $emplyee->phone = $request->phone;
        $emplyee->nid = $request->nid;
        $emplyee->address = $request->address;
        $emplyee->experience = $request->experience;   

        // image upload 
        if ($request->hasFile('photo')) { 
            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            $localtion = public_path('images/employee/'.$imgName);     
            $img_url =  'public/images/employee/'.$imgName;
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $emplyee->photo = $img_url;        
        }

        $emplyee->salary = $request->salary;
        $emplyee->vacation = $request->vacation;
        $emplyee->city = $request->city;


        $emplyee->save();  

        if ($emplyee->save()) { 
            
            $notification = array(
                'message' => 'Employee Added Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('employee.index')->with($notification); 

        } else {
            return redirect()->back();   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|max:255|unique:employees,email,'.$id,
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:employees,phone,'.$id, 
            'address' => 'required|string',
            'experience' => 'required|string',
            'photo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:2048',      
            'nid' => 'required|numeric|unique:employees,nid,'.$id,     
            'salary' => 'required|numeric',  
            'vacation' => 'required|string',      
            'city' => 'required|string',  
        ]);

        $employee = Employee::find($id);    

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->nid = $request->nid;
        $employee->address = $request->address;
        $employee->experience = $request->experience;   

        // image upload 
        if ($request->hasFile('photo')) {  

            // delete old image file 
            if (File::exists($employee->photo)) {     
                File::delete($employee->photo);  
            }

            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();    
            $localtion = public_path('images/employee/'.$imgName);     
            $img_url =  'public/images/employee/'.$imgName;
            Image::make($image)->save($img_url);   
            // image name store to employees table    
            $employee->photo = $img_url;              
        } 

        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->save();    

        if ($employee->save()) {  
            
            $notification = array(
                'message' => 'Employee Updated Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('employee.index')->with($notification); 

        } else {
            return redirect()->back();   
        }
    }

    /**
     * Remove the specified resource from storage. 
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!is_null($employee)) {
            
            // delete image file 
            if (File::exists($employee->photo)) { 
                File::delete($employee->photo);    
            } 
            
            $employee->delete();
        }


        if ( $employee->delete() ) { 
            
              $notification = array(
                'message' => 'Employee Deleted Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->back()->with($notification);  

        } else {
            return redirect()->back();    
        }
    }
}
