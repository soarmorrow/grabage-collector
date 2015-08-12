@extends('layouts.default')

@section('title')
    Review Your Order
@endsection



@section('css')
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.1/css/lightbox.css') !!}
@endsection

@section('content')

    <div class="mdl-grid  mdl-demo ">
        <div class="mdl-cell mdl-cell--1-col"></div>
        <div class="mdl-cell mdl-cell--10-col mdl-layout__content mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--middle">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--3-col mdl-animation--default ">
                    <address style="line-height: 1.5;">
                        <strong>{{$order->first_name}} {{$order->last_name}}</strong><br>
                        {{nl2br($order->address)}}<br/>
                        {{$order->city}}, {{$order->state}} - {{$order->postcode}}<br/>
                        Phone : {{$order->phone}}<br/>
                        Email: {{\App\User::find($order->user_id)->email}}
                    </address>
                </div>
                <div class="mdl-cell mdl-cell--3-col ">
                    <h5 class="pull-right"><i class="fa fa-trash"></i> {{get_option('app')}}</h5>
                </div>
                <div class="mdl-cell mdl-cell--3-col"></div>
                <div class="mdl-cell mdl-cell--3-col">

                    <b>Invoice #{{$order->id}}</b><br/>
                    <b>Order ID:</b> {{$order->order_number}}<br/>
                    <b>Date:</b> {{date('d/m/Y h:i A', strtotime($order->created_at))}} <br/>
                    <b>Account:</b> {{\App\User::find($order->user_id)->name}}
                </div>
            </div>
            <div class="mdl-grid">
                <div class="alert alert-info" style="width: 100%;">
                    <strong>Your Order Status :<i>{{\App\Status::lists('name','id')[$order->status]}}</i></strong>
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="max-width:100%;overflow-x: auto;">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">#</th>
                            <th>Transaction ID</th>
                            <th>@lang('orders/confirm_order.amount')</th>
                            <th>@lang('orders/confirm_order.type')</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">
                                {{$order->id}}
                            </td>
                            <td>
                                {{$order->transaction_id}}
                            </td>
                            <td>
                                <code>{{$order->quantity}}</code> * <code>{{get_option('rate')}}</code> =
                                <code>${{$order->amount}}</code>
                            </td>
                            <td>
                                {{\App\PaymentType::find($order->payment_type)->name}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    @if($order->attachments()->count() > 0)
                        <h5>Attached Images</h5>
                    @endif
                    @forelse($order->attachments()->get() as $photo)
                            <div class="masonry">
                                <div class="item">
                                    <a href="{{asset($photo->source_path)}}" data-lightbox="{{$order->order_number}}"
                                    data-title="{{$order->map}}">
                                        <img src="{{asset($photo->source_path)}}" class="img-responsive thumbnail pull-left"
                                        style="width: 20%; margin-right: 10px;height: 120px;" alt="{{$order->map}}"/>
                                    </a>
                                </div>
                            </div>

                    @empty
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="alert alert-warning" style="margin-bottom: 0!important;">
                                        <h4><i class="fa fa-exclamation-triangle"></i> Info:</h4>
                                        There is no photos attached with this Order
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.1/js/lightbox.js') !!}

@endsection