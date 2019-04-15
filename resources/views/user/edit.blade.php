@extends('layouts.app')

@section('content')
    <div class="container"> 

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('user.index') }}">Users</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">User Update</h3></div>


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

                        <form role="form" method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data"> 

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
                            </div>

                
                            <div class="form-group">
                                
                                <img src="{{ asset($user->photo) }}" id="image" style="margin-bottom: 8px">
                                <br>  
                                <label for="photo">Photo</label> 
                                <input type="file" name="photo" id="photo" class="form-control-file upload" accept="image/*" placeholder="Photo" onchange="readURL(this);">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>

                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                            </div>

                            <div class="form-group">
                                <label for="password-confirm" >Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="" disabled> Choose User Type</option>
                                    <option value="admin" {{ $user->type == 'admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="superadmin" {{ $user->type == 'superadmin' ? 'selected' : ''}}>Super Admin</option>  
                                </select> 
                            </div>

                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update User</button>     
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