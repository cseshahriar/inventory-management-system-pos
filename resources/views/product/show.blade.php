@extends('layouts.app')

@section('content')
    <div class="container"> 

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('product.index') }}">Products</a></li>   
                    <li class="active">Show</li>  
                </ol>
            </div>
        </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading waves-effect waves-light bg-primary">
                        <h3 class="panel-title">Product Show</h3>
                    </div>

                    <div class="panel-body"> 
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach(App\Category::all() as $category)   
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{ $category->cat_name }}</option> 
                                    @endforeach    
                                </select> 
                            </div>

                            <div class="form-group">
                                <label for="category_id">Supplier</label> 
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option value="" selected>Select Supplier</option>
                                    @foreach(App\Supplier::all() as $supplier)    
                                    <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : ''}}>{{ $supplier->name }}</option> 
                                    @endforeach     
                                </select> 
                            </div>

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" value="{{ $product->product_name }}">  
                            </div>

                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}">     
                            </div>

                            <div class="form-group">
                                <label for="product_godown">Product Godown</label>
                                <input type="text" name="product_godown" id="product_godown" class="form-control" placeholder="Product Godown" value="{{ $product->product_godown }}">         
                            </div>

                            <div class="form-group">
                                <label for="product_route">Product Route</label>
                                <input type="text" name="product_route" id="product_route" class="form-control" placeholder="Product Route" value="{{ $product->product_route }}">      
                            </div>

                            <div class="form-group">
                                
                                <img src="{{ asset($product->product_image) }}" id="image" style="margin-bottom: 8px">
                                <br>  
                                <label for="product_image">Photo</label> 
                            </div>

                            <div class="form-group"> 
                                <label for="bye_date">Buying Dates</label> 
                                <div class="bootstrap-datepicker">
                                    <input id="datepicker" type="text" name="bye_date" class="form-control" value="{{ $product->bye_date }}" /> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="expire_date">Expire Dates</label> 
                                <div class="bootstrap-datepicker">
                                    <input id="datepicker2" type="text" name="expire_date" class="form-control" value="{{ $product->expire_date }}" />      
                                </div>   
                            </div>

                            <div class="form-group">
                                <label for="buying_price">Buying Price</label>
                                <input type="text" name="buying_price" id="buying_price" class="form-control" value="{{ $product->buying_price }}">   
                            </div> 

                            <div class="form-group">
                                <label for="selling_price">Selling Price</label> 
                                <input type="text" name="selling_price" id="selling_price" class="form-control" value="{{ $product->selling_price }}">   
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected>Select Status</option>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : ''}}>Inactive</option>
                                </select>  
                            </div>   
                            
                            <a href="{{ route('product.index') }}" class="btn btn-purple waves-effect waves-light">Back</a> 
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