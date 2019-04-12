@extends('layouts.app')

@section('content')
    <div class="container"> 

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('setting.index') }}">Settings</a></li>
                    <li class="active">View</li> 
                </ol>
            </div>
        </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading waves-effect waves-light bg-primary">
                        <h3 class="panel-title">Update Settings</h3>
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

                        <form role="form" method="post" action="{{ route('setting.update', $setting->id) }}" enctype="multipart/form-data">     
                            
                            @csrf  
                            @method('PUT')

                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" value="{{ $setting->company_name }}">  
                            </div>

                            <div class="form-group">
                                <label for="company_address">Company Address</label>
                                <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Company Address" value="{{ $setting->company_address }}">  
                            </div>
                        
                            <div class="form-group">
                                <label for="company_email">Email</label>
                                <input type="email" name="company_email" id="company_email" class="form-control" placeholder="Email" value="{{ $setting->company_email }}">  
                            </div>
                        
                            <div class="form-group">
                                <label for="company_phone">Phone Number</label>
                                <input type="text" name="company_phone" id="company_phone" class="form-control" placeholder="Phone Number" value="{{ $setting->company_phone }}">   
                            </div>

                             <div class="form-group">
                                <label for="company_mobile">Phone Mobile</label>
                                <input type="text" name="company_mobile" id="company_mobile" class="form-control" placeholder="Phone Mobile" value="{{ $setting->company_mobile }}">     
                            </div>
                        
                            <div class="form-group">
                                <img src="{{ asset($setting->company_logo) }}" id="image" style="margin-bottom: 8px">    
                                <br>  
                                <label for="company_logo">Logo</label> 
                                <input type="file" name="company_logo" id="company_logo" class="form-control-file upload" accept="image/*" placeholder="Photo" onchange="readURL(this);"> 
                            </div> 

                            <div class="form-group">
                                <label for="company_city">Company City</label>
                                <input type="text" name="company_city" id="company_city" class="form-control" placeholder="Company City" value="{{ $setting->company_city }}">     
                            </div> 

                            <div class="form-group">
                                <label for="company_country">Company Country</label>
                                <input type="text" name="company_country" id="company_country" class="form-control" placeholder="Company Country" value="{{ $setting->company_country }}">     
                            </div> 

                            <div class="form-group">
                                <label for="company_zipcode">Company Zip Code</label>
                                <input type="text" name="company_zipcode" id="company_zipcode" class="form-control" placeholder="Company Zip Code" value="{{ $setting->company_zipcode }}">       
                            </div> 
                            
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Save Changs</button>
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