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
            background: bottom right 15% no-repeat #46B6AC;
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
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">

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
                                    <input class="mdl-textfield__input" type="text" name="email" id="email"/>
                                    <label class="mdl-textfield__label" for="email">Mobile Number or Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                    <input class="mdl-textfield__input" type="password" name="password" id="password"/>
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="remember" class="pull-left" style="line-height: 23px;">Remember Me</label>
                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect pull-right" for="remember">
                                    <input type="checkbox" name="remember" id="remember" class="mdl-switch__input"/>
                                    <span class="mdl-switch__label"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border center-block">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--4-col">
                                <button type="submit"
                                        class=" mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect fullwidth">
                                    <i class="fa fa-key"></i> Login
                                </button>
                            </div>
                            <div class="mdl-cell mdl-cell--4-col">
                                <button type="button" onclick="javascript:location.href='{{url('auth/register')}}';"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect fullwidth">
                                    <i class="fa fa-briefcase"></i> Create Account
                                </button>
                            </div>
                            <div class="mdl-cell mdl-cell--4-col">
                                <button type="button" onclick="javascript:location.href='{{url('password/email')}}';"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect fullwidth">
                                    Forgot Password ?
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
