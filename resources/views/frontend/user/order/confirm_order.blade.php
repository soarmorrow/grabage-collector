@extends('layouts.default')

@section('title')
    Confirm details before proceeding to payment
@endsection


@section('content')

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col mdl-animation--default">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--middle">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">@lang('orders/confirm_order.address')</th>
                    <th>@lang('orders/confirm_order.amount')</th>
                    <th>@lang('orders/confirm_order.photos')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">
                        {{nl2br($order->address)}}<br/>
                        {{$order->city}}, {{$order->state}} - {{$order->postcode}}<br/>
                        Phone : {{$order->phone}}
                    </td>
                    <td>
                        <code>{{$order->quantity}}</code> * <code>{{get_option('rate')}}</code> = <code>{{get_option('currency_symbol')}}{{$order->amount}}</code>
                    </td>
                    <td width="300px">
                        <div class="grid">
                        @forelse($order->attachments()->get() as $photo)
                        <div class="grid-item">
                            <img src="{{asset($photo->source_path)}}" alt="{{$order->city}}" style="width: 100%" />
                        </div>
                        @empty
                            No images available
                        @endforelse
                    </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <br />
            <button type="submit"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect pull-right">
                <i class="fa fa-credid-card"></i>
                 Pay Now
            </button>
            <a href="{{route('cod-order',$order->id)}}" style="margin-right: 10px"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect pull-right">
                <i class="fa fa-money"></i>
                Cash On Delivery
            </a>
        </div>
    </div>
@endsection