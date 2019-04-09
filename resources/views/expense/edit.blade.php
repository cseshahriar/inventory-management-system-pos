@extends('layouts.app')

@section('content')
    <div class="container"> 

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('expense.index') }}">Expenses</a></li>
                    <li class="active">Edit</li> 
                </ol>
            </div>
        </div>


        <div class="row">
            <!-- Basic example -->
            <div class="col-md-6 offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading waves-effect waves-light bg-primary">
                        <h3 class="panel-title">Edit Expense</h3>
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

                        <form role="form" method="post" action="{{ route('expense.update', $expense->id) }}" >  
                            
                            @csrf 
                            @method('PUT')

                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea name="details" id="details" cols="3" rows="3" class="form-control" placeholder="Expense Details">{{ $expense->details }}</textarea> 
                            </div>

                            <div class="form-group">
                                <label for="amount">amount</label>
                                <input type="number" name="amount" id="amount"  class="form-control" placeholder="Amount" value="{{ $expense->amount }}"> 
                            </div>

                            <div class="form-group">
                                <label for="month">Month</label>
                                <select name="month" id="month" class="form-control">
                                    <option value="">Select Month</option> 
                                    <option value="{{ $expense->month }}" selected>{{ $expense->month }}</option> 
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option> 
                                      
                                </select> 
                            </div>

                        
                            <div class="form-group"> 
                                <label for="date">Dates</label> 
                                <div class="bootstrap-datepicker">
                                    <input id="datepicker" type="text" name="date" class="form-control" value="{{ $expense->date }}" />   
                                </div>
                            </div>

                            <button type="submit" class="btn btn-purple waves-effect waves-light">Add Expense</button> 
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