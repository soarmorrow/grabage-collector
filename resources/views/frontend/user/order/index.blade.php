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
                        <code>{{$order->quantity}}</code> * <code>5</code> = <code>${{$order->amount}}</code>
                    </td>
                    <td>

                        Pending
                    </td>
                    <td>

                        <strong>{{$order->created_at->diffForHumans()}}</strong>
                    </td>
                    <td>
                        <i class="fa fa-credit-card  fa-2x"></i>
                        <i class="fa fa-truck fa-2x"></i>
                    </td>
                    <td>
                        <button type="button"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-button--colored mdl-js-ripple-effect">
                            View
                        </button>
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

            {!! $orders->render() !!}
    </div>
</div>
@endsection