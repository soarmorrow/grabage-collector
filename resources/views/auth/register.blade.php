@extends('layouts.screen')

@section('title')
    Register for your account
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

            {{--@if (count($errors) > 0)--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}
            <form class="form-horizontal" role="form" method="POST" action="{{url('auth/register')}}">
                <div class="mdl-card mdl-shadow--2dp demo-card-square">
                    <div class="mdl-card__title mdl-card--expand">
                        <h2 class="mdl-card__title-text">Create Account</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo {{$errors->has('name')?'has-error':''}}">
                                    <input class="mdl-textfield__input" type="text" name="name" id="name"
                                           value="{{ old('name') }}"/>
                                    <label class="mdl-textfield__label" for="name">Name</label>
                                </div>

                                {!! $errors->has('name')?'<span class="text-danger">'.$errors->first('name').'</span>':'' !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo {{$errors->has('phone')?'has-error':''}}">
                                    <input class="mdl-textfield__input" type="tel" name="phone" id="phone"
                                           value="{{ old('phone') }}"/>
                                    <label class="mdl-textfield__label" for="phone">Phone Number</label>
                                </div>

                                {!! $errors->has('phone')?'<span class="text-danger">'.$errors->first('phone').'</span>':'' !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo {{$errors->has('email')?'has-error':''}}">
                                    <input class="mdl-textfield__input" type="email" name="email" id="email"
                                           value="{{ old('email') }}"/>
                                    <label class="mdl-textfield__label" for="email">Email Address</label>
                                </div>

                                {!! $errors->has('email')?'<span class="text-danger">'.$errors->first('email').'</span>':'' !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo  {{$errors->has('password')?'has-error':''}}">
                                    <input class="mdl-textfield__input" type="password" name="password" id="password"/>
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div>

                                {!! $errors->has('password')?'<span class="text-danger">'.$errors->first('password').'</span>':'' !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo {{$errors->has('password_confirmation')?'has-error':''}}">
                                    <input class="mdl-textfield__input" type="password" name="password_confirmation"
                                           id="password_confirmation"/>
                                    <label class="mdl-textfield__label" for="password_confirmation">Confirm
                                        Password</label>
                                </div>
                                {!! $errors->has('password_confirmation')?'<span class="text-danger">'.$errors->first('password_confirmation').'</span>':'' !!}
                            </div>
                        </div>
                        <div class="center-block">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell-6-col-mobile mdl-cell--6-col">
                                    <button type="submit"
                                            class="btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                      <i class="fa fa-sign-in"></i>  Sign me up
                                    </button>
                                </div>
                                <div class="mdl-cell  mdl-cell-6-col-mobile mdl-cell--6-col">
                                    <button type="button" onclick="javascript:location.href='{{url('auth/login')}}';"
                                            class="btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                        <i class="fa fa-key"></i> Take me to login page
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
