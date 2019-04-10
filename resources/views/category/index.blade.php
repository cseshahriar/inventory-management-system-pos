@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('category.index') }}">Categories</a></li>
	                <li class="active">Create</li> 
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">All Category</h3></div>

                    <div class="panel-body"> 
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="datatable datatable-editable table table-striped table-bordered"> 
                                    
                                    <thead>  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th> 
                                            <th>Slug</th>  
                                            <th>Parent Category</th>    
                                            <th>Status</th>  
                                            <th>Tools</th> 
                                        </tr>
                                    </thead>

                          
                                    <tbody>

										@foreach($categories  as $category)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $category->cat_name }}</td>
                                            <td>{{ $category->cat_slug }}</td>
                                            <td>
                                                @if($category->category_id)
                                                {{ $category->parent->cat_name }}
                                                @else
                                                    {{ 'It\'s Primary Category' }} 
                                                @endif
                                            </td>    
                                            <td>
                                                @if($category->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-warning">Inactive</span>
                                                @endif
                                            </td> 
                                            <td class="actions"> 
                                               
												{{-- edit --}}
                                            	<a href="{{ route('category.edit', $category->id) }}" class="on-default edit-row">
                                            		<i class="fa fa-pencil-square"></i>   
                                            	</a>     

												{{-- delete	 --}}
												<form id="category" action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline;border:0"> 
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

            		$('#category')[0].submit();        

                } else {
                    swal("Safe Data!");   
                }
            });
        });
   </script>
@endsection