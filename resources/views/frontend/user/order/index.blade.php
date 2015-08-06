@extends('layouts.default')

@section('title')
    Order History
@endsection


@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col mdl-animation--default">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--middle">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">@lang('orders/confirm_order.address')</th>
                    <th>@lang('orders/confirm_order.amount')</th>
                    <th>@lang('orders/confirm_order.status')</th>
                    <th>@lang('orders/confirm_order.time')</th>
                    <th>@lang('orders/confirm_order.type')</th>
                    <th>@lang('action.action')</th>
                </tr>
                </thead>
                <tbody>

                @forelse($orders as $order)
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            {{nl2br($order->address)}}<br/>
                            {{$order->city}}, {{$order->state}} - {{$order->postcode}}<br/>
                            Phone : {{$order->phone}}
                        </td>
                        <td>
                            <code>{{$order->quantity}}</code> * <code>{{get_option('rate')}}</code> =
                            <code>${{$order->amount}}</code>
                        </td>
                        <td>
                            <label class="{{\Illuminate\Support\Facades\Config::get('status.'.$order->status)}}">{{\App\Status::lists('name','id')[$order->status]}}</label>
                        </td>
                        <td>

                            <strong>{{$order->created_at->diffForHumans()}}</strong>
                        </td>
                        <td>
                            @if(\App\PaymentStatus::find($order->payment_type)->name == 'Cash On Delivery')
                                <i class="fa fa-money fa-2x"></i> Cash On Delivery
                            @else
                                <i class="fa fa-credit-card  fa-2x"></i> Online Payment
                            @endif
                        </td>
                        <td>
                            <a href="{{route('review-order',[$order->id,$order->order_number])}}"
                               class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-button--colored mdl-js-ripple-effect">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <p class="mdl-typography--text-center">No orders available at the moment</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            @if($orders)

                {!! $orders->appends(Request::get('q'))->render() !!}
            @endif
        </div>
    </div>
@endsection