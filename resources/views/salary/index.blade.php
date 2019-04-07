@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('salary.index') }}">Salaries</a></li>
	                <li class="active">Create</li>
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Salaries List</h3></div>

                    <div class="panel-body">
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="datatable datatable-editable table table-striped table-bordered"> 
                                    
                                    <thead>  
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th> 
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Salary</th>
                                            <th>Advance Salary</th>
                                            <th>Status</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>

                          
                                    <tbody>

										@foreach($salaries  as $salary)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $salary->employee->name }}</td>
                                            <td>{{ $salary->month }}</td> 
                                            <td>{{ $salary->year }}</td>
                                            <td>{{ $salary->employee->salary }} TK</td>
                                            <td>{{ $salary->employee->advance_salary }}</td>
                                            <td>
                                                @if($salary->status == 1)
                                                <span class="text-success">Paid</span>
                                                @else
                                                <span class="text-danger">Unpaid</span>
                                                @endif 
                                            </td> 
                                           
                                              <td class="actions">
                                               
                                            	{{-- show --}}
                                            	<a href="{{ route('salary.show', $salary->id) }}" class="on-default edit-row">
                                            		<i class="fa fa-eye"></i>
                                            	</a>    

												{{-- edit --}}
                                            	<a href="{{ route('salary.edit', $salary->id) }}" class="on-default edit-row">
                                            		<i class="fa fa-pencil-square"></i>   
                                            	</a>    

												{{-- delete	 --}}
												<form class="salary" action="{{ route('salary.destroy', $salary->id) }}" method="post" style="display: inline;border:0">
													@csrf  
													@method('DELETE')  

													<button class="on-default remove-row delete" type="submit" style="border: none;background: none">	
														<i class="fa fa-trash"></i> 
													</button>    
												</form>  
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