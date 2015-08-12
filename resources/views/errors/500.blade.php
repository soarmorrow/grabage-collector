@extends('layouts.errors')

@section('title')
    {{get_option('app')}} :: Something went wrong !!
@endsection

@section('content')
    <div id="site-layout-example-top" class="col s12">
        <p class="flat-text-logo center white-text caption-uppercase">{{!empty($message)?$message:'Internal Server Error'}}</p>
    </div>
    <div id="site-layout-example-right" class="col s12 m12 l12">
        <div class="row center">
            <h1 class="text-long-shadow col s12">500</h1>
        </div>
        <div class="row center">
            <p class="center white-text col s12">Something has gone seriously wrong. Please try later.</p>

            <p class="center s12">
                <button onclick="goBack()" class="btn waves-effect waves-light">Back</button>
                <a href="{{route('home')}}" class="btn waves-effect waves-light">Homepage</a>
            <p>
            </p>
        </div>
    </div>
@endsection