<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container"> 
        @php
            $customer = DB::table('customers')->where('id', $id)->first(); 
        @endphp

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4>Invoice</h4>
                    </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="float-left">
                                @php 
                                      $setting = DB::table('settings')->first();
                                @endphp
                                <h4 class="text-right"><img src="{{ asset($setting->company_logo) }}" alt="velonic"></h4>
                                
                            </div>
                            <div class="float-right">
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
                                            @foreach(Cart::content() as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1}}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td> {{ $item->price }}</td>
                                                <td>{{ $item->qty * $item->price }}</td>
                                                <td> {{ $item->total }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3 col-md-offset-9">
                                <p class="text-right"><b>Sub-total:</b>{{ Cart::subtotal() }}</p>
                                <p class="text-right">VAT: {{ Cart::tax() }}%</p>
                                <hr>
                                <h3 class="text-right">{{ Cart::total() }}</h3>
                            </div> 
                        </div>
                    </div>
                </div>

            </div>

        </div>   
    </div> <!-- container --> 
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

