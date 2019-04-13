@extends('layouts.app')

@section('content')
 	<div class="container"> 

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12 bg-info">
	            <h4 class="pull-left page-title text-white">POS (Point of Sales)</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('pos.index') }}" class="text-white">POS</a></li> 
	                <li class="active text-white" style="color:#fff !important">View</li>  
	            </ol>
	        </div>
	    </div>


        <div class="row" style="margin-top: 30px">

            {{-- categories --}}
            <div class="row" style="margin-bottom: 15px">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="portfolioFilter">
                        @foreach(App\Category::all() as $category)
                            <a href="#" data-filter="#" @if($loop->index == 0) {{ 'class=current' }} @endif>{{ $category->cat_name }}</a>   
                        @endforeach
                    </div>
                </div>    
            </div>
            {{-- / categories --}}

            <!-- Basic example -->
            <div class="col-md-6">

                <div class="panel panel-default">
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

                    </div>
                </div>

                {{-- pricing tables --}}
                
                <div class="price_card text-center">
                    <ul class="price-features" style="border: 1px solid #ddd">
            
                        <table class="table">

                            <thead class="bg-primary">
                                <th style="color: #fff !important">Name</th>
                                <th style="color: #fff !important">Unite Price</th>
                                <th style="color: #fff !important">Quantity</th> 
                                <th style="color: #fff !important">Subtotal</th> 
                                <th style="color: #fff !important">Tools</th> 
                            </thead>

                            <tbody> 
                                @foreach(Cart::content() as $item)
                                <tr>
                                    <td>{{ $item->name}}</td>
                                    <td>&#2547; {{ $item->price }}</td> 
                                    <td>
                                        
                                        {{-- qty update --}} 

                                        <form action="{{ url('/qty-update/'.$item->rowId) }}" method="post">
                                            
                                            @csrf  
                                            <input type="number" name="qty" id="qty" style="width:40px" value="{{ $item->qty }}">
                                            <button type="submit" style="margin: 0" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></button> 
                                            
                                        </form> 
                                    </td>
                                    <td>
                                        <input type="text" name="subtotal" id="subtotal" style="width: 65px" value="{{ $item->price * $item->qty }}"> 
                                    </td>
                                    <td class="actions">
                                        {{-- delete  --}}
                                        <form action="{{ url('/cart-remove/'.$item->rowId) }}" method="post" style="display: inline;border:0">  
                                            @csrf
                                            <button class="on-default remove-row" type="submit" style="border: none;background: none;margin: 0">   
                                                <i class="fa fa-trash"></i> 
                                            </button>    
                                        </form>  
                                    </td> 
                                </tr>
                                @endforeach 
                            </tbody> 
                        </table>
                    </ul>
                    <div class="pricing-footer bg-primary" style="padding:15px 0px;">
                        <p>Quantity: {{ Cart::count() }}</p>
                        <p>Subtotal: {{ Cart::subtotal() }}</p>
                        <p>Tax: {{ Cart::tax() }}%</p>
                        <hr>
                        <span class="price" style="font-size: 18px;padding:5px">Total: &#2547; {{ Cart::total() }} </span>  
                    </div>

                     {{-- invoice form --}}
                    <form action="{{ url('/create-invoice') }}" method="post">
                    
                        @csrf
                         <h4>Customers 
                            <a href="" class="pull-right btn btn-xs btn-primary waves-effect waves-light" data-toggle="modal" data-target="#customer">Add New</a>
                        </h4>

                        <select name="customer_id" id="customer_id" class="form-control">
                            <option value="" disabled selected>-- Select Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option> 
                            @endforeach
                        </select> 

                        <button type="submit" class="btn btn-lg btn-success">Create Invoice</button>

                    </form> {{-- / invoice form --}}  

                </div> <!-- end Pricing_card -->
            </div> <!-- col-->

            <!-- Basic example -->
            <div class="col-md-6">
                <table id="datatable" class="datatable datatable-editable table table-striped table-bordered"> 
                                    
                    <thead>  
                        <tr>
                            <th>#</th>
                            <th>Image</th>  
                            <th>Name</th> 
                            <th>Product Code</th>  
                            <th>Category</th>  
                            <th>Tools</th>  
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($products  as $product)
                        <tr>
                            <form action="{{ url('/add-cart')}}" method="post">
                                
                                @csrf 
                                <input type="hidden" name="id" value="{{ $product->id }}"> 
                                <input type="hidden" name="name" value="{{ $product->product_name }}"> 
                                <input type="hidden" name="qty" value="1"> 
                                <input type="hidden" name="price" value="{{ $product->selling_price }}">   

                            <td>{{ $loop->index +1 }}</td>
                            <td>
                                <img src="{{ asset($product->product_image) }}" alt="" width="60">
                            </td>
                            <td>{{ $product->product_name }}</td> 
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->category->cat_name }}</td> 
                            <td>
                                <button type="submit" class="btn btn-xs btn-primary">Add to Cart</button>
                            </td>
                           </form>
                        </tr>
                        @endforeach  
                    
                    </tbody>
                </table>
            </div> <!-- col-->
            
        </div> <!-- End row -->
	</div> <!-- container -->

    {{-- modal --}}
    <div id="customer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="customer" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header">  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add a New Customer</h4>  
            </div> 
            
            <form role="form" method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">  
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach 
                    </ul>
                </div>
            @endif
            <div class="modal-body">    

                <div class="row"> 
                    <div class="col-md-6">  
                            
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}" required> 
                            </div>  

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ old('email') }}" required> 
                            </div>  

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}" required>
                                
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                               
                                <textarea name="address" id="address" cols="3" rows="3" class="form-control" placeholder="Address" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="form-group">
                                
                                <img src="#" id="image" style="margin-bottom: 8px">
                                <br>  
                                <label for="photo">Photo</label> 
                                <input type="file" name="photo" id="photo" class="form-control-file upload" accept="image/*" placeholder="Photo" onchange="readURL(this);" required>
                            </div>
                    </div> 

                    <div class="col-md-6">  
                         <div class="form-group">
                            <label for="shopname">Shopname</label>
                           
                            <input type="text" name="shopname" id="shopname" class="form-control" placeholder="Shopname" value="{{ old('shopname') }}" required>
                        </div>

                       <div class="form-group">
                            <label for="account_holder">Account Holder</label>  
                           
                            <input type="text" name="account_holder" id="account_holder" class="form-control" placeholder="Account Holder" value="{{ old('account_holder') }}" required>   
                        </div>

                        <div class="form-group">
                            <label for="account_number">Account Number</label>  
                           
                            <input type="number" name="account_number" id="account_number" class="form-control" placeholder="Account Number" value="{{ old('account_number') }}" required>  
                        </div> 

                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>  
                           
                            <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name" value="{{ old('bank_name') }}" required>  
                        </div> 

                         <div class="form-group">
                            <label for="bank_brance">Bank Brance</label>
                            <input type="text" name="bank_brance" class="form-control" id="bank_brance" placeholder="Bank Brance" value="{{ old('bank_brance') }}" required> 
                        </div>

                         <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ old('city') }}" required> 
                        </div>
                    </div> 

                </div> 
            </div> 

            <div class="modal-footer">  
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button> 
                <button type="submit" class="btn btn-info waves-effect waves-light">Add New Customers</button>  
            </div> 

            </form>  
        </div> 
    </div>
</div><!-- /.modal -->
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

