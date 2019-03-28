@include('layouts.header')

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            @include('layouts.topbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.left-sidebar')
            <!-- Left Sidebar End --> 


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
             <div class="content-page">
        
                <!-- Start content -->
                <div class="content">
                   
                    <!-- container -->
                    @yield('content')  
                    <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>   
                
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            @include('layouts.right-sidebar') 
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

@include('layouts.footer') 