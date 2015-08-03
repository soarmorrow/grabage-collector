@extends('layouts.default')

@section('title')
    Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/paper-collapse.css')}}" />
@endsection

@section('content')
    <div class="mdl-grid demo-content">
        <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div class="collapse-card">
                <div class="collapse-card__heading">
                    <div class="collapse-card__title">
                        <i class="fa fa-question-circle fa-2x fa-fw"></i>
                        Shipping Address
                    </div>
                </div>
                <div class="collapse-card__body">
                    <!-- Body Text -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/plugins/paper-collapse.js')}}"></script>
    <script>
        $(function(){
            $('.collapse-card').paperCollapse()
        });
    </script>
@endsection