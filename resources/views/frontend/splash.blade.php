@extends('layouts.screen')

@section('title')
    Welcome to our fastest ingredient delivery
@endsection

@section('css')
    <!-- Square card -->
    <style>
        body {
            overflow: hidden;
        }

        .background {
            background-image: url("{{asset('images/bg.jpg')}}");
            background-repeat: repeat;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            -webkit-animation: moveright infinite 500s linear; /* Safari 4+ */
            -moz-animation: moveright infinite 500s linear; /* Fx 5+ */
            -o-animation: moveright infinite 500s linear; /* Opera 12+ */
            animation: moveright infinte 500s linear; /* IE 10+, Fx 29+ */

        }

        .splash_logo {
            width: 50%;
            position: relative;
            margin: 0 auto;
        }

        @keyrames moveright {

        from {
            background-position: 0 0;
        }

        to {
            background-position: 100000px 0;
        }

        }
        @-webkit-keyframes moveright {

            from {
                background-position: 0 0;
            }
            to {
                background-position: 100000px 0;
            }

        }
    </style>
@endsection

@section('content')
    <div class="background"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="animate">
                <img src="{{asset('images/delivery_chiken.gif')}}" class="img-responsive splash_logo" alt="fast"/>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(window).load(function(){
            setTimeout(function(){
                location.href = '{{url('auth/login')}}';
            },500);
        })
    </script>
@endsection