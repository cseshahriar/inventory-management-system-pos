<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();    
        return view('category.index', compact('categories'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create'); 
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
            'cat_name' => 'required|string|unique:categories,cat_name',
            'status' => 'required|numeric' 
        ]);

        $category = new Category; 

        $category->cat_name = $request->cat_name;
        $category->category_id = $request->category_id; 
        $category->cat_slug = str_slug($request->cat_name);
        $category->status = $request->status;
        $category->save();

        if ($category->save()) {    
            
            $notification = array(
                'message' => 'Category Added Successfully', 
                'alert-type' => 'success' 
            );

            return redirect()->route('category.index')->with($notification);   

        } else {
            return redirect()->back();      
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::find($id);    
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'cat_name' => 'required|string|unique:categories,cat_name,'.$id,
            'status' => 'required|numeric'  
        ]);

        $category = Category::find($id);  

        $category->cat_name = $request->cat_name;
        $category->category_id = $request->category_id; 
        $category->cat_slug = str_slug($request->cat_name);
        $category->status = $request->status;
        $category->save(); 

        if ($category->save()) {    
            
            $notification = array(
                'message' => 'Category Updated Successfully',  
                'alert-type' => 'success'  
            );

            return redirect()->route('category.index')->with($notification);   

        } else {
            return redirect()->back();      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);  

        $delete = $category->delete();

        if ($delete) {     
            
            $notification = array(
                'message' => 'Category Deleted Successfully', 
                'alert-type' => 'success'  
            );

            return redirect()->route('category.index')->with($notification);    

        } else {
            return redirect()->back();       
        }
    }
}
