@extends('layouts.app')

@section('content')
    <div class="container"> 

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('attendance.index') }}">Attendance</a></li>
                    <li class="active">Edit</li> 
                </ol>
            </div>
        </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading waves-effect waves-light bg-primary">
                        <h3 class="panel-title">Edit Attendance</h3>
                    </div>

                    <div class="panel-body"> 

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" method="post" action="{{ route('attendance.update', $attendance->id) }}" >    
                            
                            @csrf 
                            @method('PUT') 

                             <div class="form-group">
                                <label for="name">Employee </label>
                                <p>{{ $attendance->employee->name  }}</p>
                                <img src="{{ asset($attendance->employee->photo ) }}" alt="" width="60">
                             </div>

                            <div class="form-group">
                                <label for="attendance">Attendance</label> 

                                <select name="attendance" id="attendance" class="form-control">
                                    <option value="">Select Attendance</option>
                                    <option value="Present" {{ $attendance->attendance == 'Present' ? 'selected' : ''}}>Present</option>
                                    <option value="Absense" {{ $attendance->attendance == 'Absense' ? 'selected' : ''}}>Absense</option> 
                                </select>   
                              
                            </div>  
                            
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update Attendance</button>  
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