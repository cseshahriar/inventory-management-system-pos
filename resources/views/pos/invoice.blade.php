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
                                      <strong>Name: {{ $customer->name }}</strong><br>
                                      <strong>Shop Name: {{ $customer->shopname }}</strong><br>
                                      Address: {{ $customer->address }}<br>
                                      City: {{ $customer->city }}<br> 
                                      <br>
                                      <i class="fa fa-phone"></i> {{ $customer->phone }}
                                      </address>
                                      
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Order Date: </strong> {{ date('l jS \of F Y') }}</p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> #123456</p> 
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
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                            @foreach($carts as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1}}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>&#2547; {{ $item->price }}</td>
                                                <td>&#2547; {{ $item->qty * $item->price }}</td>
                                                <td>&#2547; {{ $item->total }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3 col-md-offset-9">
                                <p class="text-right"><b>Sub-total:</b> &#2547; {{ Cart::subtotal() }}</p>
                                <p class="text-right">VAT: {{ Cart::tax() }}%</p>
                                <hr>
                                <h3 class="text-right">&#2547; {{ Cart::total() }}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print"> 
                            <div class="pull-right">
                                <a href="#" class="btn btn-inverse waves-effect waves-light" onclick="window.print()"> 
                                    <i class="fa fa-print"></i> 
                                </a>
                                <a href="#" data-toggle="modal" data-target="#invoice" class="btn btn-primary waves-effect waves-light">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>	 
	</div> <!-- container -->


    {{-- modal --}}

    <div id="invoice" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="invoice" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header">  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Invoice of {{ $customer->name }}
                <span class="pull-right" style="margin-right:10px">Total: &#2547; {{ Cart::total() }} </span>
                </h4>   
            </div> 
                        
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  

                <form action="{{ url('/final-invoice') }}" method="post">     
                    
                    @csrf 

                    <div class="modal-body">     
                        <div class="row">  
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="payment">Payment</label>    
                                    <select name="payment_status" id="payment_status" class="form-control" required>
                                        <option value="" disabled selected>-- Choose Payment --</option>
                                        <option value="HandCash">HandCash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Due">Due</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pay">Payment Amount</label>
                                    <input type="text" name="pay" id="pay">
                                </div>
                            </div>

                            <div class="col-md-4">  
                                <div class="form-group">
                                    <label for="due">Due Amount</label>
                                    <input type="text" name="due" id="due">
                                </div>
                            </div> 
                        </div> 
                    </div>  
                    
                    {{-- some hidden inputs --}} 
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <input type="hidden" name="order_date" value="{{ date('Y-m-d') }}">
                    <input type="hidden" name="order_status" value="Pending">
                    <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                    <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                    <input type="hidden" name="tax" value="{{ Cart::tax() }}">
                    <input type="hidden" name="total" value="{{ Cart::total() }}">  

                    <div class="modal-footer">  
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button> 
                        <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>  
                    </div> 
                </form>     
        </div> 
    </div>
</div><!-- /.modal -->
@endsection  


