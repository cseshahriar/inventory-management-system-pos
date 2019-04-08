@extends('layouts.app')

@section('content')
    <div class="container"> 

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('category.index') }}">Categories</a></li>
                    <li class="active">Edit</li> 
                </ol>
            </div>
        </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading waves-effect waves-light bg-primary">
                        <h3 class="panel-title">Edit Category</h3>
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

                        <form role="form" method="post" action="{{ route('category.update', $category->id) }}" >  
                            
                            @csrf 
                            @method('PUT')

                            <div class="form-group">
                                <label for="category_id">Parent Category (Optional)</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Parent Category</option>
                                    @foreach(App\Category::where('category_id', NULL)->get() as $parent)  
                                        <option value="{{ $parent->id }}" {{ $category->category_id == $parent->id ? 'selected' : ''}}>{{ $parent->cat_name }}</option>    
                                    @endforeach  
                                </select> 
                            </div>

                        
                            <div class="form-group">
                                <label for="cat_name">Name</label>
                                <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Name" value="{{ $category->cat_name }}">  
                            </div>

                        
                            <div class="form-group">
                                <label for="status">Status</label>

                                <select name="status" id="status" class="form-control">
                                    <option value="" selected>Select Status</option>
                                    <option value="1" {{ $category->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : ''}}>Inactive</option> 
                                </select>
                              
                            </div>  
                            
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update Category</button>  
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