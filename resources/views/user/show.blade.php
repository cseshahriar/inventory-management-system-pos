@extends('layouts.app')

@section('content')
 	<div class="container"> 

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('employee.index') }}">Employee</a></li>
	                <li class="active">Show</li>
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Employee Show</h3></div>


                    <div class="panel-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <p>{{ $employee->name }}</p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <p>{{ $employee->email }}</p>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <p>{{ $employee->phone }}</p>
                                
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <p>{{ $employee->address }}</p>
                            </div>

                            <div class="form-group">
                                <label for="experience">Experience</label> 
                                <p>{{ $employee->experience }}</p>
                            </div>

                            <div class="form-group">
                               	
                                <label for="photo">Photo</label> <br>
                                <img src="{{ asset($employee->photo) }}"  style="width:80px">
                               
                            </div>

                            <div class="form-group">
                                <label for="nid">National ID No.</label>  
                                <p>{{ $employee->nid }}</p>
                            </div>

                             <div class="form-group">
                                <label for="salary">Salary</label>
                                <p>{{ $employee->salary }}</p>
                            </div>

                             <div class="form-group">
                                <label for="vacation">Vacation</label>
                                <p>{{ $employee->vacation }}</p>
                            </div>

                             <div class="form-group">
                                <label for="city">City</label>
                              <p>{{ $employee->city }}</p>
                            </div>

                          <a href="{{ route('employee.index') }}" class="btn btn-xs btn-success">Back</a>
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