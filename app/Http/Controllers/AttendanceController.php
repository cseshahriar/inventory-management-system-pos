<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class AttendanceController extends Controller
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
        $attendences = Attendance::all();   
        return view('attendance.index', compact('attendences'));          
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single() 
    {
        $month = date('F');
        $attendences = Attendance::where('month', $month)->get();   
        return view('attendance.single', compact('attendences'));          
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $employees = Employee::all();  
        return view('attendance.create', compact('employees'));     
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       $date = $request->att_date;
       $att_date = DB::table('attendances')->where('att_date', $date)->first();

       if ($att_date) {

            $notification = array(
                'message' => 'Todays Attendances Already Taken',
                'alert-type' => 'error'  
            );

            return redirect()->back()->with($notification);   
       } else {
           
           foreach ($request->user_id as $id) {
                $data[] = [
                    "user_id" => $id,
                    "att_date" => $request->att_date,
                    "att_year" => $request->att_year,
                    "attendance" => $request->attendance[$id],
                    'month' => date('F'),  
                    'created_at' => date('Y-m-d'), 
                ];
            } 

            $att = DB::table('attendances')->insert($data);  

            if ($att) {   
                
                $notification = array(
                    'message' => 'Successfully Attendance Taken',
                    'alert-type' => 'success' 
                );

                return redirect()->route('attendance.index')->with($notification);      

            } else {
                $notification = array(
                    'message' => 'Something went wrongs!',
                    'alert-type' => 'success' 
                );
                return redirect()->back();     
            }
       }   
    }

    public function edit($id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.edit', compact('attendance'));  
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'attendance' => 'required' 
        ]);

        $attendance = Attendance::find($id);
        $attendance->attendance = $request->attendance;
        $attendance->save();  

           if ($attendance->save()) {   
                
                $notification = array(
                    'message' => 'Successfully Attendance Updated',
                    'alert-type' => 'success' 
                );

                return redirect()->route('attendance.index')->with($notification);      

            } else {
                return redirect()->back();      
            }
    }

}
