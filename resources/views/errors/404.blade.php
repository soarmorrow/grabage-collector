@extends('layouts.errors')

@section('title')
    Oops.. Page not found !!
@endsection

@section('content')
    <div id="site-layout-example-top" class="col s12">
        <p class="flat-text-logo center white-text caption-uppercase">{{!empty($message)?$message:'Sorry but we couldn’t find this page :('}}</p>
    </div>
    <div id="site-layout-example-right" class="col s12 m12 l12">
        <div class="row center">
            <h1 class="text-long-shadow col s12">404</h1>
        </div>
        <div class="row center">
            <p class="center white-text col s12">It seems that this page doesn’t exist.</p>

            <p class="center s12">
                <button onclick="goBack()" class="btn waves-effect waves-light">Back</button>
                <a href="{{route('home')}}" class="btn waves-effect waves-light">Homepage</a>
            <p>
            </p>
        </div>
    </div>
@endsection