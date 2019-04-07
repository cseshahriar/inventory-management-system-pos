@extends('layouts.app')

@section('content')
 	<div class="container"> 

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('salary.index') }}">Salary Information</a></li>
	                <li class="active">Update</li>
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Salary Information Update</h3></div>  

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

                        <form role="form" method="post" action="{{ route('salary.update', $salary->id) }}" enctype="multipart/form-data">   
                        	
                            @csrf
                            @method('PUT')     

                            <div class="form-group">
                                <label for="name">Employee ID</label>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">Select Employee</option>
                                    @foreach(App\Employee::all() as $emp)
                                    <option value="{{ $emp->id }}" {{ $emp->id == $salary->employee_id ? 'selected' : ''}}>{{ $emp->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="month">Month</label>
                                <select id="month" name="month" class="form-control">
                                    <option value="">Select Month</option>
    
                                    <option value="{{ $salary->month }}" selected>{{ $salary->month }}</option> 
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option> 

                                </select>  
                            </div> 

                            <div class="form-group">
                                <label for="advance_salary">Salary</label>
                                <input type="text" name="advance_salary" id="advance_salary" class="form-control" placeholder="Advance Salary" value="{{ $salary->advance_salary}}"> 
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" name="year" id="year" class="form-control" placeholder="Year" value="{{ $salary->year }}">  
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                               <select name="status" id="status" class="form-control">
                                   <option value="" selected>-- Select Status --</option>
                                   <option value="1" {{ $salary->status == 1 ? 'selected' : ''}}>Paid</option>
                                   <option value="0" {{ $salary->status == 0 ? 'selected' : ''}}>Unpaid</option>    
                               </select> 
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