<?php

namespace App\Http\Controllers;

use App\Expense; 
use Illuminate\Http\Request;

class ExpenseController extends Controller
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
    public function montnly()
    {
        $month = date('F');
        $expenses = Expense::where('month', $month)->get(); 
        return view('expense.montnly', compact('expenses'));    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single($month)
    {
       $monthlyexpenses = Expense::where('month', $month)->get(); 
       return view('expense.single', compact('monthlyexpenses', 'month'));        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expense.index', compact('expenses')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');  
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
            'details' => 'required|string',
            'month' => 'required',
            'amount'    => 'required|numeric',
            'date' => 'required|date'
        ]);

        $expense = new Expense;
        $expense->details = $request->details;
        $expense->month = $request->month;
        $expense->amount = $request->amount;
        $expense->date = $request->date; 
        $expense->save(); 

        if ($expense->save()) { 
            
            $notification = array(
                'message' => 'Expense Added Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('expense.index')->with($notification);   

        } else {
            return redirect()->back();    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('expense.edit', compact('expense'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'details' => 'required|string',
            'month' => 'required',
            'amount'    => 'required|numeric',
            'date' => 'required|date'
        ]);

        $expense = Expense::find($id);
        $expense->details = $request->details;
        $expense->month = $request->month;
        $expense->amount = $request->amount;
        $expense->date = $request->date; 
        $expense->save(); 

        if ($expense->save()) { 
            
            $notification = array(
                'message' => 'Expense Updated Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('expense.index')->with($notification);   

        } else {
            return redirect()->back();    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id); 

        if (!is_null($expense)) {
            
            // unlink($employee->photo);
            
            $delete = $expense->delete();
            
            if ( $delete ) { 
                
                  $notification = array(
                    'message' => 'Expense Deleted Successfully',
                    'alert-type' => 'success'  
                );

                return redirect()->back()->with($notification);   

            } else {
                return redirect()->back();       
            } 
        }
    }
}
