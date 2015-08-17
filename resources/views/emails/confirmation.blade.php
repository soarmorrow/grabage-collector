@extends('emails.layout')

@section('content')
    <table style="width:100%;border-collapse:collapse">
        <tbody>
        <tr>
            <td style="font:14px/1.4285714 Arial,sans-serif;padding:0;vertical-align:top">
                <address>
                    <strong>{{$order->first_name}} {{$order->last_name}}</strong><br>
                    {{nl2br($order->address)}}<br/>
                    {{$order->city}}, {{$order->state}} - {{$order->postcode}}<br/>
                    Phone : {{$order->phone}}<br/>
                    Email: {{\App\User::find($order->user_id)->email}}
                </address>
            </td>
            <td style="font:14px/1.4285714 Arial,sans-serif;padding:0 0 0 10px">
                <h2> {{get_option('app')}}</h2>
            </td>
            <td style="font:14px/1.4285714 Arial,sans-serif;padding:0 0 0 10px">

                <b>Invoice #{{$order->id}}</b><br/>
                <b>Order ID:</b> {{$order->order_number}}<br/>
                <b>Date:</b> {{date('d/m/Y h:i A', strtotime($order->created_at))}} <br/>
                <b>Account:</b> {{\App\User::find($order->user_id)->name}}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr style="border-bottom: none;border-top: 1px solid #333;opacity: 0.2" />

                <div style="padding: 15px;
                            margin-bottom: 20px;
                            border: 1px solid transparent;
                            border-radius: 4px;background-color: #d9edf7;
                            border-color: #bce8f1;
                            text-align: center;
                            color: #31708f;">
                <strong>Your Order Status :<i>{{\App\Status::lists('name','id')[$order->status]}}</i></strong>
                </div>
                <table style="width:100%;border-collapse:collapse">
                    <tbody>
                    <tr>
                        <td style="font:14px/1.4285714 Arial,sans-serif;padding:10px 0 20px">


                            <table style="width:100%;border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px;">
                                       #
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px;">
                                        Order Number
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px;">
                                        Transaction ID
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px">
                                        @lang('orders/confirm_order.amount')
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px">
                                        @lang('orders/confirm_order.type')
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px;">
                                        Date
                                    </th>
                                </tr>
                                <tr>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;">
                                    <span
                                            style="padding:0 0 0 5px; color: rgba(186, 49, 0, 0.90)">
                                        {{$order->id}}
                                    </span>


                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;font-family:Monaco,monospace;font-size:12px">

                                         <span
                                                 style="padding:0 0 0 5px;">
                                              {{$order->order_number}}
                                         </span>
                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;font-family:Monaco,monospace;font-size:12px">

                                         <span
                                                 style="padding:0 0 0 5px;">
                                              {{$order->transaction_id?$order->transaction_id:'N/A'}}
                                         </span>
                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070">
                                        <span
                                                style="padding:0 0 0 5px; color: rgba(186, 49, 0, 0.90)">
                                            <code>{{$order->quantity}}</code> * <code>{{get_option('rate')}}</code> =
                            <code>{{get_option('currency_symbol')}}{{$order->amount}}</code>
                                        </span>
                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;">
                                        <div>
                                                                               <span
                                                                                       style="padding:0 0 0 5px;">
                                                                               {{\App\PaymentType::find($order->payment_type)->name}}
                                                                               </span>
                                        </div>
                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;">
                                        <div>
                                                                                <span class="aBn"
                                                                                      data-term="goog_492599922"
                                                                                      tabindex="0"><span
                                                                                            class="aQJ">{{$order->created_at->diffForHumans()}}</span></span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection