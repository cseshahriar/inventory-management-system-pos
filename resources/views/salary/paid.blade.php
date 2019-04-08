@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('salary.paid') }}">All Salary</a></li>
	                <li class="active">Create</li>
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Salary
                            <span class="pull-right text-danger"> 
                                {{ date('F Y') }}
                            </span>
                        </h3>
                    </div>

                    <div class="panel-body"> 
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="datatable datatable-editable table table-striped table-bordered"> 
                                    
                                    <thead>  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th> 
                                            <th>Photo</th> 
                                            <th>Month</th>
                                            <th>Advance</th>
                                            <th>Salary</th>  
                                            <th>Tools</th> 
                                        </tr>
                                    </thead>
                          
                                    <tbody>
                                        <!-- advance salary -->
                                        <!-- / advance salary -->

										@foreach($employees  as $employee) 
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                <img src="{{ asset($employee->photo) }}" alt="" width="80">
                                            </td>

                                            <td>
                                                <span class="badge badge-success">{{ date('F', strtotime('-1 months')) }}
                                                </span>
                                            </td>   

                                            <td>
                                                @foreach($advances as $advance)
                                                @if($employee->id == $advance->employee_id)
                                                    {{ $advance->advance_salary }}  
                                                    TK
                                                @endif 
                                                @endforeach
                                            </td> 
                                            <td>{{ $employee->salary }} TK</td> 

                                           
                        
                                            <td class="actions">
                                               
												{{-- pay --}}
                                            	<a href="" class="btn btn-warning edit-row">
                                            		<i class="fa fa-money"> Pay Now</i>
                                            	</a>      
                                            </td> 
                                        
                                        </tr>
                                        @endforeach  
                                    
                                    </tbody>
                                </table>

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

            		$('.salary')[0].submit();      

                } else {
                    swal("Safe Data!");   
                }
            });
        });
   </script>
@endsection