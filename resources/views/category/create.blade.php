@extends('layouts.app')

@section('content')
 	<div class="container"> 

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('category.index') }}">Categories</a></li>
	                <li class="active">Create</li> 
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading waves-effect waves-light bg-primary">
                        <h3 class="panel-title">Add New Category</h3>
                    </div>

                    <div class="panel-body"> 

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" method="post" action="{{ route('category.store') }}" >  
                        	
                            @csrf 

                            <div class="form-group">
                                <label for="category_id">Parent Category (Optional)</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" selected>Select Parent Category</option>
                                    @foreach(App\Category::where('category_id', NULL)->get() as $parent)   
                                    <option value="{{ $parent->id }}">{{ $parent->cat_name }}</option>
                                    @endforeach    
                                </select> 
                            </div>

                        
                            <div class="form-group">
                                <label for="cat_name">Name</label>
                                <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Name">  
                            </div>

                        
                            <div class="form-group">
                                <label for="status">Status</label>

                                <select name="status" id="status" class="form-control">
                                    <option value="" selected>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                              
                            </div>  
                            
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Add Category</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col-->
            
        
        </div> <!-- End row -->

             
	</div> <!-- container -->
@endsection 

@section('extjs')  
<script>
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result).height(80).width(80);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function () {
        readURL(this);
    });
</script>
@endsection