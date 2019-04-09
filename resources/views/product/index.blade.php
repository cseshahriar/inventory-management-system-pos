@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('product.index') }}">Products</a></li>
	                <li class="active">List</li>  
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">All Products</h3></div>

                    <div class="panel-body"> 
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="datatable datatable-editable table table-striped table-bordered"> 
                                    
                                    <thead>  
                                        <tr>
                                            <th>#</th> 
                                            <th>Name</th> 
                                            <th>Code</th>  
                                            <th>Selling Price</th>    
                                            <th>Image</th>    
                                            <th>Godwon</th>    
                                            <th>Route</th>      
                                            <th>Status</th>  
                                            <th>Tools</th> 
                                        </tr>
                                    </thead>

                          
                                    <tbody>

										@foreach($products  as $product)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>
                                                <img src="{{ asset($product->product_image) }}" alt="" style="width:40px">
                                            </td>
                                            <td>{{ $product->product_godown }}</td>
                                            <td>{{ $product->product_route }}</td>
                                           
                                            <td>
                                                @if($product->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-warning">Inactive</span>
                                                @endif
                                            </td> 
                                            <td class="actions"> 
                                               
												{{-- edit --}}
                                            	<a href="{{ route('product.show', $product->id) }}" class="on-default edit-row">
                                            		<i class="fa fa-eye"></i>    
                                            	</a>     
                                               
                                                {{-- edit --}}
                                                <a href="{{ route('product.edit', $product->id) }}" class="on-default edit-row">
                                                    <i class="fa fa-pencil-square"></i>   
                                                </a>     

												{{-- delete	 --}}
												<form id="product" action="{{ route('product.destroy', $product->id) }}" method="post" style="display: inline;border:0"> 
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

            		$('#product')[0].submit();        

                } else {
                    swal("Safe Data!");   
                }
            });
        });
   </script>
@endsection