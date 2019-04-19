@extends('layouts.app')

@section('content')
 	<div class="container">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Welcome !</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('user.index') }}">Users</a></li>
	                <li class="active">Create</li>
	            </ol>
	        </div>
	    </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">User List</h3></div>

                    <div class="panel-body">
						<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if(Auth::user()->type === 'superadmin')
                                <table id="datatable" class="datatable datatable-editable table table-striped table-bordered">
                                    
                                    <thead>   
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Created At</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>

                          
                                    <tbody>

										@foreach($users  as $user)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td> 
                                            <td>
                                            	<img src="{{ asset($user->photo) }}" alt="" width="80"> 
                                            </td> 
                                             <td>{{ucwords($user->type) }}</td>    
                                             <td>
                                             	{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}
                                             </td>   

                                              <td class="actions">
                                               @if(Auth::user()->type == 'superadmin')
												{{-- edit --}}
                                            	<a href="{{ route('user.edit', $user->id) }}" class="on-default edit-row">
                                            		<i class="fa fa-pencil-square"></i>   
                                            	</a>    

												{{-- delete	 --}}
												<form id="user" action="{{ route('user.destroy', $user->id) }}" method="post" style="display: inline;border:0">
													@csrf  
													@method('DELETE')  

													<button class="on-default remove-row delete" type="submit" style="border: none;background: none">	
														<i class="fa fa-trash"></i> 
													</button>    
												</form>  
                                                @endif 
                                            </td>
                                           
                                           
                                        </tr>
                                        @endforeach 
                                    
                                    </tbody>
                                </table>
                        @else
                            <h3 class="text-danger">Access Denied!</h3>
                            <p class="alert alert-danger">You don't currently have permission to access this action.</p>
                        @endif
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

            		$('#user')[0].submit();     

                } else {
                    swal("Safe Data!"); 
                }
            });
        });
   </script>

@endsection