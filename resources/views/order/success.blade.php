@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('pending.order') }}">Orders</a></li>
	                <li class="active">View</li>  
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">All Success Orders</h3></div>

                    <div class="panel-body">  
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="datatable datatable-editable table table-striped table-bordered"> 
                                    
                                    <thead>  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th> 
                                            <th>Date</th>  
                                            <th>Quantity</th>    
                                            <th>Total Amount</th>  
                                            <th>Payment Status</th>  
                                            <th>Order Status</th>   
                                            <th>Tools</th> 
                                        </tr>
                                    </thead>

                          
                                    <tbody>

										@foreach($orders  as $order)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->order_date }}</td> 
                                            <td>{{ $order->total_products }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>  
                                               {{ $order->payment_status }}
                                            </td>
                                            <td> 
                                                <span class="badge badge-success">{{ $order->order_status }}</span> 
                                            </td>  
                                             
                                            <td class="actions"> 
												{{-- show --}}
                                            	<a href="{{ route('order.success.show', $order->id ) }}" class="on-default edit-row">
                                            		<i class="fa fa-eye"></i>  
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