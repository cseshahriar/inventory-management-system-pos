@extends('layouts.app')

@section('content')
 	<div class="container"> 

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('customer.index') }}">Customers Information</a></li>
	                <li class="active">Update</li>
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Customers Information Update</h3></div>  


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

                        <form role="form" method="post" action="{{ route('customer.update', $customer->id) }}" enctype="multipart/form-data">   
                        	
                            @csrf
                            @method('PUT')     

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $customer->name }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $customer->email }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $customer->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                               
                                <textarea name="address" id="address" cols="3" rows="3" class="form-control" placeholder="Address">{{ $customer->address }}</textarea>
                               
                            </div>

                            <div class="form-group">
                               	
                               	<img src="{{ asset($customer->photo) }}" id="image" style="margin-bottom: 8px;width: 80px"> 
								<br>  
                                <label for="photo">Photo</label>  
                                <input type="file" name="photo" id="photo" class="form-control-file upload" accept="image/*" placeholder="Photo" onchange="readURL(this);"> 
                                
                            </div> 

                            <div class="form-group">
                                <label for="shopname">Shopname</label>
                               
                                <input type="text" name="shopname" id="shopname" class="form-control" placeholder="Shopname" value="{{ $customer->shopname }}">
                            </div>

                            <div class="form-group">
                                <label for="account_holder">Account Holder</label>  
                               
                                <input type="text" name="account_holder" id="account_holder" class="form-control" placeholder="Account Holder" value="{{ $customer->account_holder }}">   
                            </div>

                            <div class="form-group">
                                <label for="account_number">Account Number</label>  
                               
                                <input type="number" name="account_number" id="account_number" class="form-control" placeholder="Account Number" value="{{ $customer->account_number }}">  
                            </div> 

                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>  
                               
                                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name" value="{{ $customer->account_name }}">  
                            </div> 

                             <div class="form-group">
                                <label for="bank_brance">Bank Brance</label>
                                <input type="text" name="bank_brance" class="form-control" id="salary" placeholder="Bank Brance" value="{{ $customer->bank_brance}}"> 
                            </div>
                    
                             <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ $customer->city }}">
                            </div>

                          
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Save Changes</button> 
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