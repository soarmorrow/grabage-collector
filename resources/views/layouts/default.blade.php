<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">
    <meta name="_token" content="{{csrf_token()}}" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/paper-collapse.css')}}"/>

    <!-- OSX Style CSS files -->
    {!! Html::style('css/bootstrap-label.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css') !!}
    {!! Html::style('https://storage.googleapis.com/code.getmdl.io/1.0.1/material.red-indigo.min.css') !!}
    {!! Html::style('css/bootstrap-alert.css') !!}
    {!! Html::style('css/material.min.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    @yield('css')
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
        body{
            overflow-x: hidden;
        }
        .about-modal{
            position: absolute !important;
            width: 60%;
            left: 22%;
            top: 20%;
            z-index: 9999;
        }
        #preloader{
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            max-width: 100%;
            background-color: #ffffff;
            z-index: 999999;
        }
        #preloader > div{
            position: absolute;
            left: 50%;
            top: 45%;
        }
    </style>
</head>
<body>

<div id="preloader">
    <div class="mdl-spinner mdl-js-spinner is-active"></div>
</div>
<div class="overlay"></div>

{{--About Modal--}}
<div class="modal about-modal hide">
    <section class="demo-graphs mdl-shadow--2dp collapse-card  mdl-cell mdl-cell--12-col">
        <h3>{{get_option('about')['title']}}</h3>
        <!-- Colored FAB button with ripple -->
        <a class="pull-right modal-close mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
            <i class="material-icons">close</i>
        </a>
        <article>
            {!! get_option('about')['content'] !!}
        </article>
    </section>
</div>

{{--Contact Modal--}}
<div class="modal contact-modal hide">
    <section class="demo-graphs mdl-shadow--2dp collapse-card  mdl-cell mdl-cell--12-col">
        <h3>Get in touch !</h3>
        <!-- Colored FAB button with ripple -->
        <a class="pull-right modal-close mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
            <i class="material-icons">close</i>
        </a>
        <article>
            {!! get_option('contact') !!}
        </article>
    </section>
</div>


{{--Privacy Modal--}}
<div class="modal legal-modal hide">
    <section class="demo-graphs mdl-shadow--2dp collapse-card  mdl-cell mdl-cell--12-col">
        <h3>{{get_option('legal')['title']}}</h3>
        <!-- Colored FAB button with ripple -->
        <a class="pull-right modal-close mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
            <i class="material-icons">close</i>
        </a>
        <article>
            {!! get_option('legal')['content'] !!}
        </article>
    </section>
</div>

<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

    @include('layouts.header')
    @include('layouts.sidebar')

    <main class="mdl-layout__content mdl-color--grey-100">

        @yield('content')
    </main>
</div>

{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') !!}
{!! Html::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js') !!}
{!! Html::script('js/modal.js') !!}
{!! Html::script('js/material.min.js') !!}
{!! Html::script('js/plugins/bootstrap-alert.js') !!}
<script type="text/javascript">

    $(window).load(function(){
        $("#preloader").fadeOut();
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
</script>
@include('notifications')
@yield('js')
</body>
</html>
