@extends('layouts.app')

@section('content')
 <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Moltran</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>

        <!-- Start Widget -->
        @php
            $today = date('Y-m-d');
            $todaySales = DB::table('orders')->where('order_date', $today)->where('order_status', 'Success')->sum('total');
        @endphp

        <div class="row">

            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $todaySales }}</span>
                        Today Sales  
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Sales <span class="pull-right"></span></h5>
                        </div>
                    </div>
                </div>
            </div>
            
              @php
              $today = date('Y-m-d');
              $todayNewOrder = DB::table('orders')->where('order_date', $today)->where('order_status', 'Pending')->sum('total'); 
             @endphp
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $todayNewOrder }}</span>
                        New Orders
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Orders <span class="pull-right"></span></h5>
                           
                        </div>
                    </div>
                </div>
            </div>
            
             @php
              $employees = DB::table('employees')->get();
              $totalEmp = count($employees);
             @endphp
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $totalEmp }}</span>
                        Employees
                    </div>
                </div>
            </div>
            
            @php
              $customers = DB::table('customers')->get();
              $total = count($customers);
            @endphp
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $total }}</span>
                        Customers
                    </div>
                </div>
            </div>
            
            @php
              $suppliers = DB::table('suppliers')->get();
              $total = count($suppliers);
            @endphp
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $total }}</span>
                        Suppliers
                    </div>
                </div>
            </div>
            
            @php
              $categories = DB::table('categories')->get();
              $total = count($categories); 
            @endphp
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary">
                        <i class="fa fa-list"></i>
                    </span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $total }}</span>
                        Categories
                    </div>
                </div>
            </div>
            
            @php
              $products = DB::table('products')->get();
              $totalProducts = count($products); 
            @endphp
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary">
                       <i class="fa fa-list"></i>
                    </span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $totalProducts }}</span>
                        Products
                    </div>
                </div>
            </div>

            @php
              $attendances = DB::table('attendances')->get();
              $totalAttendances = count($attendances); 
            @endphp
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary">
                       <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    </span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $totalAttendances }}</span>
                        Attendances
                    </div>
                </div>
            </div> 

        </div> 
        <!-- End row--> 
    </div> <!-- container -->
@endsection 
