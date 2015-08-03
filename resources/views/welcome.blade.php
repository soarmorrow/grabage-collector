@extends('layouts.default')

@section('title')
    Welcome to our fastest ingredient delivery
@endsection

@section('css')
    <!-- Square card -->
    <style>
        .demo-card-square.mdl-card {
            width: 320px;
            height: 320px;
        }

        .demo-card-square > .mdl-card__title {
            color: #fff;
            background: url('{{asset('images/delivery-scooter.jpg')}}') bottom right 15% no-repeat #46B6AC;
        }
    </style>
@endsection

@section('content')
    <div class="mdl-card mdl-shadow--2dp demo-card-square">
        <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Update</h2>
        </div>
        <div class="mdl-card__supporting-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenan convallis.
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                View Updates
            </a>
        </div>
    </div>
@endsection