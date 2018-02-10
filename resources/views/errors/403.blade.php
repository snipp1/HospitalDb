<!DOCTYPE html>
<html lang="en" class="full-page-image">
<head>
    <meta charset="utf-8">
    <title>Error!</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="author" content="Melchizedek">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet' type='text/css'>
    <link type="text/css" href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    

    </head>

    <body class="error">
        
        
    <div class="error-wrapper">

        <div class="container">
            @if(empty($exception))
            <h1>Uh-oh!</h1>

            <p>It looks like you have taken a wrong turn</p>
            <p class="mb20">If you are in denial and think it's a conspiracy that cannot possibly be true, try using the search bar below.</p>
        
            <div class="row">
                <div class="col-md-12">

                    <p class="text-center mt-lg"><a href="#">Return to Home page</a></p>
                </div>
            </div>
                @else
                <h1>Uh-oh!</h1>
                <p>{{ $exception->getMessage() }}</p>
                <div class="row">
                    <div class="col-md-12">
@if(session()->has('duplicate'))
                            <div class="alert alert-danger">
                                <ul>

                                        <li>Enter your Login details again to log in</li>

                                </ul>
                            </div>
                            <form action="{{route('logout_all')}}" method="post">
                                {{csrf_field()}}
                            <div class=" col-md-12"><input type="text" class="form-control" name="username" id="" placeholder="Username"></div>
                                <br>
                                <br>
                            <div class=" col-md-12"><input type="password"  class="form-control" name="password" id="" placeholder="Password"></div>
                                <br>
                                <br>
                            <button class="btn btn-warning" type="submit">Log all sessions out</button>
                            </form>
    @else
                            <h3 class="text-info">It looks like you have taken a wrong turn</h3>
                            <p class="text-center mt-lg"><a href="{{route('login')}}">Click here to return to Home page</a></p>

                        @endif
                         </div>
                </div>
            @endif
        </div>
    </div>


    
    
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

    <script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.min.js')}}"></script> 							<!-- Load jQuery -->
    <script type="text/javascript" src="{{asset('assets/js/jqueryui-1.10.3.min.js')}}"></script> 							<!-- Load jQueryUI -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script> 								<!-- Load Bootstrap -->
    <script type="text/javascript" src="{{asset('assets/js/enquire.min.js')}}"></script> 									<!-- Load Enquire -->

    <script type="text/javascript" src="{{asset('assets/plugins/velocityjs/velocity.min.js')}}"></script>					<!-- Load Velocity for Animated Content -->
    <script type="text/javascript" src="{{asset('assets/plugins/velocityjs/velocity.ui.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/plugins/wijets/wijets.js')}}"></script>     						<!-- Wijet -->

    <script type="text/javascript" src="{{asset('assets/plugins/codeprettifier/prettify.js')}}"></script> 				<!-- Code Prettifier  -->
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-switch/bootstrap-switch.js')}}"></script> 		<!-- Swith/Toggle Button -->

    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')}}"></script>  <!-- Bootstrap Tabdrop -->

    <script type="text/javascript" src="{{asset('assets/plugins/iCheck/icheck.min.js')}}"></script>     					<!-- iCheck -->

    <script type="text/javascript" src="{{asset('assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js')}}"></script> <!-- nano scroller -->

    <script type="text/javascript" src="{{asset('assets/js/application.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/demo/demo.js')}}"></script>
{{--<script type="text/javascript" src="assets/demo/demo-switcher.js"></script>--}}

<!-- End loading site level scripts -->
    <!-- Load page level scripts-->
    

    <!-- End loading page level scripts-->

    </body>
</html>