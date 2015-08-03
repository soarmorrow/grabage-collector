@extends('layouts.screen')

@section('title')
    Login for your order
@endsection

@section('css')
    <!-- Square card -->
    <style>
        body {
            overflow-y: scroll;
        }

        .demo-card-square.mdl-card {
            width: 100%;
        }

        .demo-card-square > .mdl-card__title {
            color: #fff;
            background:  bottom right 15% no-repeat #46B6AC;
        }

        .background {
            background-image: url("{{asset('images/bg.jpg')}}");
            background-repeat: repeat;
            position: fixed;
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
    </style>
@endsection

@section('content')
    <div class="background"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4">


                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                <div class="mdl-card mdl-shadow--2dp demo-card-square">
                    <div class="mdl-card__title mdl-card--expand">
                        <h2 class="mdl-card__title-text">Login</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input class="mdl-textfield__input" type="text" name="email" id="email" />
                                        <label class="mdl-textfield__label" for="email">Mobile Number or Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input class="mdl-textfield__input" type="password" name="password" id="password" />
                                        <label class="mdl-textfield__label" for="password">Password</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <label for="remember" class="pull-left" style="line-height: 23px;">Remember Me</label>
                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect pull-right" for="remember">
                                        <input type="checkbox" name="remember" id="remember" class="mdl-switch__input" />
                                        <span class="mdl-switch__label"></span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="pull-right mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style="margin-right: 15px;">
                                        <i class="material-icons">arrow_forward</i>
                                    </button>
                                </div>
                            </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border center-block">
                        <button type="button" onclick="javascript:location.href='{{url('password/email')}}';" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">Forgot Password ?</button>
                        <button type="button" onclick="javascript:location.href='{{url('auth/register')}}';" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect"><i class="fa fa-briefcase"></i> Create Account</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection
