<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Inventory Management System and POS">
        <meta name="author" content="cse.shahriar.hosen@gmail.com"> 

        <link rel="shortcut icon" href="{{ asset('public/images/favicon_1.ico') }}">

        <title>Inventory Management System and POS</title>

        <!-- Base Css Files -->
        <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('public/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('public/css/waves-effect.css') }}" rel="stylesheet"> 

        <!-- Custom Files -->
        <link href="{{ asset('public/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('js/modernizr.min.js') }}"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Inventory</strong> </h3>
                </div> 


                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                         @csrf
                        
                        <div class="form-group ">
                            <div class="col-xs-12">

                                 <input id="email" type="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                
                                 <input id="password" type="password" class="form-control input-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                     <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30">
                            <div class="col-sm-7">
                                <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i>  {{ __('Forgot Your Password?') }} </a>
                            </div>

                        </div>
                    </form> 
                </div>                                 
                
            </div>
        </div> 

        
        <script>
            var resizefunc = [];
        </script>
        <script src="{{ asset('public/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/js/waves.js') }}"></script>
        <script src="{{ asset('public/js/wow.min.js') }}"></script>
        <script src="{{ asset('public/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('public/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('public/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('public/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('public/assets/jquery-blockui/jquery.blockUI.js') }}"></script>


        <!-- CUSTOM JS -->
        <script src="{{ asset('public/js/jquery.app.js') }}"></script> 
    
    </body>
</html>