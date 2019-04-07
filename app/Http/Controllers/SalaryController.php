<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;


class SalaryController extends Controller  
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
        $salaries = Salary::all();  
        return view('salary.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salary.create');   
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
            'employee_id' => 'required',  
            'month' => 'required',   
            'year' => 'required',   
            'advance_salary' => 'nullable' 
        ]);

        $salary = new Salary;

        $salary->employee_id = $request->employee_id;
        $salary->month = $request->month;
        $salary->year = $request->year;
        $salary->advance_salary = $request->advance_salary;

        $salary->save();  

        if ($salary->save()) { 
            
            $notification = array(
                'message' => 'Salary Added Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('salary.index')->with($notification);  

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
        $salary = Salary::find($id);
        return view('salary.show', compact('salary'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary = Salary::find($id);
        return view('salary.edit', compact('salary')); 
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
            'employee_id' => 'required',  
            'month' => 'required',  
            'year' => 'required',   
            'advance_salary' => 'nullable',   
        ]);

        $salary = Salary::find($id);  

        $salary->employee_id = $request->employee_id;
        $salary->month = $request->month;
        $salary->year = $request->year;
        $salary->advance_salary = $request->advance_salary;

        $salary->save();  

        if ($salary->save()) { 
            
            $notification = array(
                'message' => 'Salary Updated Successfully', 
                'alert-type' => 'success' 
            );

            return redirect()->route('salary.index')->with($notification);  

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
         $salary = Salary::find($id); 

        if (!is_null($salary)) {
            
            // unlink($employee->photo);
            
            $delete = $salary->delete();
            
            if ( $delete ) { 
                
                  $notification = array(
                    'message' => 'Salary Deleted Successfully',
                    'alert-type' => 'success'  
                );

                return redirect()->back()->with($notification);  

            } else {
                return redirect()->back();       
            } 
        }
    }
}
