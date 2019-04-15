<?php

namespace App\Http\Controllers;

use Auth; 
use Image; 
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
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
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048', 
            'type' => 'nullable|string',  
        ]);

        $user = new User; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->type = $request->type;  

        // image upload 
        if ($request->hasFile('photo')) { 
            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            $localtion = public_path('images/users/'.$imgName);     
            $img_url =  'public/images/users/'.$imgName;
            Image::make($image)->save($img_url);    
            // image name store to users table     
            $user->photo = $img_url;          
        }

        $user->save(); 

        if ($user->save()) { 
            
            $notification = array(
                'message' => 'User Added Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('user.index')->with($notification); 

        } else {
            return redirect()->back();   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|max:255|unique:users,email,'.$id,   
            'password' => 'nullable|string|min:8', 
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',    
            'type' => 'nullable|string',   
        ]);

        $user = User::find($id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);  
        $user->type = $request->type;  

        // image upload 
        if ($request->hasFile('photo')) { 
            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            $localtion = public_path('images/users/'.$imgName);     
            $img_url =  'public/images/users/'.$imgName;
            Image::make($image)->save($img_url);    
            // image name store to users table     
            $user->photo = $img_url;          
        }

        $user->save(); 

        if ($user->save()) { 
            
            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('user.index')->with($notification); 

        } else {
            return redirect()->back();    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);  

        if (!is_null($user)) {
            
            // delete image file 
            if (File::exists($user->photo)) { 
                File::delete($user->photo);    
            } 

            // unlink($employee->photo);
            
            if($user->type == Auth::user()->type) { 
                $notification = array(
                        'message' => 'Opps! Super admin are not deletable',  
                        'alert-type' => 'error' 
                    );

                    return redirect()->back()->with($notification);  
            } else {
                $delete = $user->delete(); 
            }
            
            if ( $delete ) { 
                
                $notification = array(
                    'message' => 'User Deleted Successfully',
                    'alert-type' => 'success' 
                );

                return redirect()->back()->with($notification);  

            } else {
                return redirect()->back();    
            }
        } 
    }

    public function profile()
    {
        return view('user.profile'); 
    }

    public function setting()
    {
        return view('user.setting');
    }

    public function settingUpdate(Request $request)
    {

        $id = Auth::user()->id;   
         
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|max:255|unique:users,email,'.$id,   
            'password' => 'nullable|string|min:8', 
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',    
            'type' => 'nullable|string',   
        ]);


        $user = User::find($id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);  
        $user->type = $request->type;  

        // image upload 
        if ($request->hasFile('photo')) { 
            $image = $request->file('photo');  
            $imgName = str_slug($request->name).'-'.time().'.'.$image->getClientOriginalExtension();   
            $localtion = public_path('images/users/'.$imgName);     
            $img_url =  'public/images/users/'.$imgName;
            Image::make($image)->save($img_url);    
            // image name store to users table     
            $user->photo = $img_url;          
        }

        $user->save(); 

        if ($user->save()) { 
            
            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success' 
            );

            return redirect()->route('user.index')->with($notification); 

        } else {
            return redirect()->back();    
        }

    } 


}
