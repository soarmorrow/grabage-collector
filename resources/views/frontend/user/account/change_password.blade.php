@extends('layouts.default')

@section('title')
    Change Password
@endsection


@section('content')

    <div class="mdl-grid">
        <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col">

            {{--Form start --}}
            {!! Form::open(['url'=>route('change_password',[Auth::user()->name]),'method'=>'post']) !!}

            {{--Current Password--}}
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield {{($errors->has('old_password'))?'is-invalid':''}} mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="password" value="{{old('old_password')}}"
                               name="old_password"/>
                        <label class="mdl-textfield__label" for="old_password">What is your current password?</label>
                    </div>
                    {!! ($errors->has('password'))?'<span style="color: #de3226">'.$errors->first('old_password').'</span>':'' !!}
                </div>
            </div>

            {{--New Password--}}
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield mdl-js-textfield  {{($errors->has('password'))?'is-invalid':''}}  mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="password" value="{{old('password')}}"
                               name="password"/>
                        <label class="mdl-textfield__label" for="password">New Password</label>
                    </div>
                    {!! ($errors->has('password'))?'<span style="color: #de3226">'.$errors->first('password').'</span>':'' !!}
                </div>
            </div>

            {{-- Confirm Password --}}
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield mdl-js-textfield  {{($errors->has('confirm_password'))?'is-invalid':''}}  mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="password" value="{{old('confirm_password')}}"
                               name="confirm_password"/>
                        <label class="mdl-textfield__label" for="confirm_password">Confirm Password</label>
                    </div>
                    {!! ($errors->has('confirm_password'))?'<span style="color: #de3226">'.$errors->first('confirm_password').'</span>':'' !!}
                </div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="pull-right">

                        <button type="button" onclick="history.go(-1);"
                                class="pull-right mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">
                            Discard
                        </button>
                        <button type="submit" style="margin-right: 10px;"
                                class="pull-right mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect ">
                            Change password
                        </button>
                    </div>
                </div>
            </div>

            {{--Form end--}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection