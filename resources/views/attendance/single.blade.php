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
                        <h5 class="text-danger">{{ date('F Y') }} Month's Attendances</h5>
                    </div>

                    <div class="panel-body"> 
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">  
                                    
                                    <thead>  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th> 
                                            <th>Photo</th>      
                                            <th>Attendance</th>   
                                            <th>Present Date</th>   
                                            <th>Tools</th>   
                                        </tr>
                                    </thead> 

                          
                                    <tbody>    
                                        @foreach($attendences  as $attendence)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $attendence->employee->name }}</td>
                                            <td><img src="{{ asset($attendence->employee->photo) }}" alt="" width="60"></td>
                                            <td>
                                                @if($attendence->attendance == 'Present')
                                                    <span class="badge badge-success">
                                                        {{ $attendence->attendance }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-warning">
                                                        {{ $attendence->attendance }}
                                                    </span>
                                                @endif 

                                            </td>  
                                            <td>{{ $attendence->created_at->toFormattedDateString() }}</td>
                                            <td class="actions"> 
                                                {{-- edit --}}
                                                <a href="{{ route('attendance.edit', $attendence->id) }}" class="on-default edit-row">
                                                    <i class="fa fa-pencil-square"></i>   
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

                    $('#expense')[0].submit();        

                } else {
                    swal("Safe Data!");    
                }
            });
        });
   </script>
@endsection