
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="{{get_option('app')}} :: Something went wrong">
    <meta name="keywords" content="404, error, lock">
    <title>@yield('title')</title>

    <!-- Favicons-->
    {{--<link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">--}}
    <!-- Favicons-->
    {{--<link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">--}}
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    {{--<meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">--}}
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    <link href="{{asset('errors/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('errors/css/style.css')}}" type="text/css')}}" rel="stylesheet" media="screen,projection">

    <!-- Custome CSS-->
    <link href="{{asset('errors/css/custom-style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('errors/css/page-center.css')}}" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('errors/css/prism.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('errors/js/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="cyan">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->



<div id="error-page">

    <div class="row">
        <div class="col s12">
            <div class="browser-window">
                <div class="top-bar">
                    <div class="circles">
                        <div id="close-circle" class="circle"></div>
                        <div id="minimize-circle" class="circle"></div>
                        <div id="maximize-circle" class="circle"></div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ================================================
  Scripts
  ================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="{{asset('errors/js/jquery-1.11.2.min.js')}}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{asset('errors/js/materialize.js')}}"></script>
<!--prism-->
<script type="text/javascript" src="{{asset('errors/js/prism.js')}}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{asset('errors/js/perfect-scrollbar.min.js')}}"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('errors/js/plugins.js')}}"></script>

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>