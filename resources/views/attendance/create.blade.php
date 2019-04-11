@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('attendance.index') }}">Attendances</a></li>
	                <li class="active">List</li> 
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Attendance</h3>
                        <h5 class="text-danger">Today {{ date('d-m-Y') }}</h5>
                    </div>

                    <div class="panel-body"> 
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('attendance.store') }}" method="post"> 
                                <table class="table table-striped table-bordered">  
                                    
                                    <thead>  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th> 
                                            <th>Photo</th>      
                                            <th>Attendance</th>  
                                        </tr>
                                    </thead>

                          
                                    <tbody>    
										@foreach($employees  as $employee)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td><img src="{{ asset($employee->photo) }}" alt="" width="60"></td>
                                            <td>
                                                    
                                                    @csrf
                                                
                                                    <input type="radio" name="attendance[{{ $employee->id }}]" value="Present" class="checkbox-circle" required>  
                                                    <span class="text-success"> Present</span>
                                               
                                                    <input type="radio" name="attendance[{{ $employee->id }}]" value="Absense" class="checkbox-circle" required>   
                                                    <span class="text-danger"> Absense</span> 

                                                    <input type="hidden" name="user_id[]" value="{{ $employee->id }}"> 
                                                    <input type="hidden" name="att_date" value="{{ date('Y-m-d') }}">
                                                    <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                            </td>   
                                        </tr>
                                        @endforeach      
                                    
                                    </tbody>

                                </table>
                                <button type="submit" class="btn btn-xs btn-success">Save</button>  
                                </form> 
                                
                                {{-- end form --}}
                            </div>
                        </div>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col-->
            
        
        </div> <!-- End row -->

             
	</div> <!-- container -->
@endsection 

@section('extjs')
 <script> 
        $(document).on('click', '.delete', function(e) { 
        	var confirmed = false;

            e.preventDefault();
            // var link = $(this).attr("href");
            
            swal({
                title : 'Are you sure want to delete?',
                text : "Onec Delete, This will be permanently delete!",
                icon : "warning",
                buttons: true,
                dangerMode : true
            }).then((willDelete) => { 
                if (willDelete) {
                    // window.location.href = link;
                    confirmed = true;

            		$('#expense')[0].submit();        

                } else {
                    swal("Safe Data!");    
                }
            });
        });
   </script>
@endsection