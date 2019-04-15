   <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ asset(Auth::user()->photo ) }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu"> 
                                    <li>
                                        <a href="{{ route('user.profile') }}">
                                            <i class="md md-face-unlock"></i> Profile
                                            <div class="ripple-wrapper"></div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('user.setting') }}">
                                            <i class="md md-settings"></i> Settings
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="md md-settings-power"></i> Logout
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">{{ Auth::user()->type }}</p> 
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
                                    <i class="fa fa-tags"></i> 
                                    <span> POS</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a> 

                                <ul class="list-unstyled">
                                    <li><a href="{{ route('pos.create') }}">Add POS</a></li>
                                    <li><a href="{{ route('pos.index') }}">All POS</a></li> 
                                </ul> 
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect">
                                    <i class="fa fa-users"></i> 
                                    <span> Users</span>
                                    <span class="pull-right"><i class="md md-add"></i></span>
                                </a> 

                                <ul class="list-unstyled">
                                    <li><a href="{{ route('user.create') }}">Add User</a></li>
                                    <li><a href="{{ route('user.index') }}">All Users</a></li> 
                                </ul> 
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
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span> Categories </span><span class="pull-right"><i class="md md-add"></i></span></a> 
                                <ul class="list-unstyled"> 

                                    <li><a href="{{ route('category.create') }}">Add Category</a></li>

                                    <li><a href="{{ route('category.index') }}">All Category</a></li>  
                                </ul>  
                            </li> 
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span> Products </span><span class="pull-right"><i class="md md-add"></i></span></a>  
                                <ul class="list-unstyled"> 

                                    <li><a href="{{ route('product.create') }}">Add Product</a></li>

                                    <li><a href="{{ route('product.index') }}">All Product</a></li>  

                                    <li><a href="{{ route('product.import.create') }}">Import Product</a></li>        
                                </ul>  
                            </li> 
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <span> Expenses </span><span class="pull-right"><i class="md md-add"></i></span></a>  
                                <ul class="list-unstyled"> 

                                    <li><a href="{{ route('expense.create') }}">Add Expense</a></li>

                                    <li><a href="{{ route('expense.index') }}">All Expense</a></li> 

                                    <li><a href="{{ route('expense.montnly') }}">Monthly Expense</a></li>    
                                </ul>  
                            </li> 
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"> 
                                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                                    <span> Orders</span><span class="pull-right"><i class="md md-add"></i></span></a>  
                                <ul class="list-unstyled"> 

                                    <li><a href="{{ route('pending.order') }}">All Pending Orders</a></li>   

                                    <li><a href="{{ route('success.order') }}">All Success Orders</a></li>    
                                </ul>  
                            </li> 
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"> 
                                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                                    <span> Sales Report </span><span class="pull-right"><i class="md md-add"></i></span></a>  
                                <ul class="list-unstyled"> 
                                    <li><a href="{{ route('attendance.index') }}">All Attendances</a></li>   
                                </ul>  
                            </li> 
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"> 
                                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                                    <span> Attendance </span><span class="pull-right"><i class="md md-add"></i></span></a>  
                                <ul class="list-unstyled"> 
                                    <li><a href="{{ route('attendance.index') }}">All Attendances</a></li> 

                                    <li><a href="{{ route('attendance.create') }}">Take Attendances</a></li> 
                                    
                                    <li><a href="{{ route('attendance.single') }}">Monthly Attendances</a></li>        
                                </ul>  
                            </li> 
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"> 
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span> Settings </span><span class="pull-right"><i class="md md-add"></i></span></a>  
                                <ul class="list-unstyled"> 
                                    <li><a href="{{ route('setting.index') }}">Settings</a></li>        
                                </ul>  
                            </li>   

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div> 
                </div>
            </div> 