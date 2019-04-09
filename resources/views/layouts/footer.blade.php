
        <script>
            var resizefunc = []; 
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('public/js/jquery.min.js') }}"></script>  
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script> 
        <script src="{{ asset('public/js/waves.js') }}"></script>
        <script src="{{ asset('public/js/wow.min.js') }}"></script>
        <script src="{{ asset('public/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('public/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('public/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('public/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('public/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('public/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('public/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

        <!-- sweet alerts -->
        <script src="{{ asset('public/assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('public/assets/sweet-alert/sweet-alert.init.js') }}"></script>

        <!-- flot Chart -->
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>
        
        <script src="{{ asset('public/assets/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('public/assets/timepicker/bootstrap-datepicker.js') }}"></script>

        <!-- Counter-up -->  
        <script src="{{ asset('public/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{ asset('public/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('public/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
        <script src="{{ asset('public/js/jquery.chat.js') }}"></script>
        
        {{-- datatable --}}
        <script src="{{ asset('public/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/assets/datatables/dataTables.bootstrap.js') }}"></script>

        <!-- Todo -->
        <script src="{{ asset('public/js/jquery.todo.js') }}"></script>  

        <script src="{{ asset('public/js/toastr.min.js') }}"></script> 

        <script src="{{ asset('public/js/sweetalert.min.js') }}"></script> 

        <script>
            @if(Session::has('message')) 
                var type = "{{ Session::get('alert-type', 'info') }}"; 
                switch (type) {
                    case 'info' :
                        toastr.info("{{ Session::get('message') }}");
                        break; 
                    case 'success' :
                        toastr.success("{{ Session::get('message') }}");
                        break; 
                    case 'warning' :
                        toastr.warning("{{ Session::get('message') }}");
                        break; 
                    case 'error' :
                        toastr.error("{{ Session::get('message') }}");
                        break;  
                }
            @endif
        </script> 

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                
                jQuery('#timepicker2').timepicker({showMeridian: false});

                jQuery('#timepicker3').timepicker({minuteStep: 15});

                // Date Picker
                jQuery('#datepicker').datepicker({format: 'yy-mm-dd'});   
                jQuery('#datepicker2').datepicker({format: 'yy-mm-dd'});   

                jQuery('#datepicker-inline').datepicker();

                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
            });

        </script>

        {{-- datatable --}}
        <script type="text/javascript">
            $(document).ready(function() {
                $('.datatable').dataTable();
            } );
        </script>  

        @yield('extjs')
    
    </body>
</html>
