   <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ asset('public/images/users/avatar-1.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="md md-face-unlock"></i> Profile
                                            <div class="ripple-wrapper"></div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="md md-settings"></i> Settings
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="md md-lock"></i> 
                                            Lock screen
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="md md-settings-power"></i> Logout
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p> 
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li> 

                            <li class="has_sub">
                                <a href="#" class="waves-effect">
                                    <i class="fa fa-users"></i>
                                    <span> Employees </span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a> 

                                <ul class="list-unstyled">
                                    <li><a href="{{ route('employee.create') }}">Add Employee</a></li>
                                    <li><a href="{{ route('employee.index') }}">All Employee</a></li>
                                </ul> 
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-tachometer"></i><span> Customers </span><span class="pull-right"><i class="md md-add"></i></span></a> 
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
                                    <li><a href="{{ route('customer.index') }}">All Customer</a></li>  
                                </ul> 
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-tachometer"></i><span> Suppliers </span><span class="pull-right"><i class="md md-add"></i></span></a> 
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('supplier.create') }}">Add Suppliers</a></li>
                                    <li><a href="{{ route('supplier.index') }}">All Suppliers</a></li>  
                                </ul> 
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-money"></i><span> Salaries (EMP) </span><span class="pull-right"><i class="md md-add"></i></span></a> 
                                <ul class="list-unstyled">

                                    <li><a href="{{ route('salary.create') }}">Add Advance Salary</a></li>

                                    <li><a href="{{ route('salary.index') }}">All Advance Salary</a></li>  

                                    <li><a href="{{ route('salary.paid') }}">All Salary</a></li>  

                                </ul> 
                            </li>   

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div> 
                </div>
            </div> 