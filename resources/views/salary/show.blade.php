@extends('layouts.app')

@section('content')
 	<div class="container"> 

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('supplier.index') }}">Suppliers</a></li>
	                <li class="active">Show</li>
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Suppliers View</h3></div>


                    <div class="panel-body">

                            <div class="form-group">
                                <label for="name">Employee Name</label>
                                <p>{{ $salary->employee->name }}</p>
                            </div>

                            <div class="form-group">
                                <label for="month">Month of Salary</label>
                                <p>{{ $salary->month }}</p>
                            </div>

                            <div class="form-group">
                                <label for="year">Year of Salary</label>
                                <p>{{ $salary->year }}</p>
                            </div>

                            <div class="form-group">
                                <label for="advance_salary">Advance Salary</label>
                                <p>{{ $salary->advance_salary }}</p>
                            </div>

                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <p>{{ $salary->employee->salary }}</p>
                            </div>

                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <p> 
                                @if($salary->status == 1) 
                                    <span class="text-success">Paid</span> 
                                @else 
                                    <span class="text-danger">Unpaid</span>
                                @endif
                                </p>
                            </div>
                
                          <a href="{{ route('salary.index') }}" class="btn btn-xs btn-success">Back</a>
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