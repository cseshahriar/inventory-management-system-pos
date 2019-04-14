@extends('layouts.app')

@section('content')
    <div class="container"> 

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Invoice</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('pos.index') }}"></a>POS</li>
                    <li class="active">Invoice</li> 
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4>Invoice</h4>
                    </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="pull-left">
                                @php 
                                      $setting = DB::table('settings')->first();
                                @endphp
                                <h4 class="text-right"><img src="{{ asset($setting->company_logo) }}" alt="velonic"></h4>
                                
                            </div>
                            <div class="pull-right">
                                <h4>Invoice # <br>
                                    <strong>{{ date('d-m-Y') }}</strong>  
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="pull-left m-t-30">
                                    <address>
                                      <strong>Name: {{ $order->name }}</strong><br>
                                      <strong>Shop Name: {{ $order->shopname }}</strong><br>
                                      Address: {{ $order->address }}<br>
                                      City: {{ $order->city }}<br> 
                                      <br>
                                      <i class="fa fa-phone"></i> {{ $order->phone }}
                                      </address>
                                      
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Order Date: </strong> {{ date('l jS \of F Y') }}</p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-success">Success</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> #{{ $order->id}}</p>  
                                </div>
                            </div>
                        </div>
                        <div class="m-h-50"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive"> 
                                    <table class="table m-t-30">
                                        <thead>
                                            <tr><th>#</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                            @foreach($orderDetails as $item) 
                                            <tr>
                                                <td>{{ $loop->index + 1}}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->product_code }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>&#2547; {{ $item->unitcost }}</td> 
                                                <td>&#2547; {{ $item->quantity * $item->unitcost }}</td>
                                                <td>&#2547; {{ $item->total }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;"> <br>  
                            
                            <div class="col-md-9">
                                <h3 class="text-left">Payment By: {{ $order->payment_status }}</h3>
                                <h3 class="text-left">Pay: &#2547; {{ $order->pay }}</h3>  
                                <h3 class="text-left">Due: &#2547; {{ $order->due }}</h3>  
                            </div>

                            <div class="col-md-3">
                                <p class="text-right"><b>Sub-total:</b> &#2547; {{ $order->sub_total }}</p>
                                <p class="text-right">VAT: {{ $order->tax }}%</p>
                                <hr>
                                <h3 class="text-right">&#2547; {{ $order->total }}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print"> 
                            <div class="pull-right">
                                <a href="#" class="btn btn-inverse waves-effect waves-light" onclick="window.print()"> 
                                    <i class="fa fa-print"></i> 
                                </a>
                                <a href="{{ route('success.order') }}" class="btn btn-primary waves-effect waves-light">Back</a>   
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>   
    </div> <!-- container -->
@endsection  


