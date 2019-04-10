@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('expense.index') }}">Expenses</a></li>
	                <li class="active">List</li> 
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Monthly Expense</h3>

                        <h5 class="text-center text-danger">Total Expense of {{ $month }}:
                        @php 
                            $total = 0; 
                            date_default_timezone_set('Asia/Dhaka');  
                            $sexpenses = App\Expense::where('month', $month)->get(); 
                           
                            foreach ($sexpenses as $expense) {
                                $total += $expense->amount;  
                            }
                            
                        @endphp 
                        {{ $total }} Tk   
                        </h5>
                    </div>

                    <div class="panel-body"> 
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="display nowrap datatable datatable-editable table table-striped table-bordered">   
                                    
                                    <thead>   
                                        <tr>
                                            <th>#</th>
                                            <th>Details</th> 
                                            <th>Amount</th>  
                                            <th>Month</th>    
                                            <th>Date</th>  
                                            <th>Tools</th> 
                                        </tr>
                                    </thead>

                          
                                    <tbody>

										@foreach($monthlyexpenses  as $expense) 
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $expense->details }}</td>
                                            <td>{{ $expense->amount }} TK</td>
                                            <td>{{ $expense->month }}</td>
                                            <td>{{ $expense->date }}</td>
                                            <td class="actions"> 
                                               
												{{-- edit --}}
                                            	<a href="{{ route('expense.edit', $expense->id) }}" class="on-default edit-row">
                                            		<i class="fa fa-pencil-square"></i>   
                                            	</a>     

												{{-- delete	 --}}
												<form id="expense" action="{{ route('expense.destroy', $expense->id) }}" method="post" style="display: inline;border:0"> 
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

            		$('#expense')[0].submit();        

                } else {
                    swal("Safe Data!");    
                }
            });
        });
   </script>
@endsection