@extends('backend.layouts.default')

@section('title')
    Order Management
@endsection

@section('css')
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.1/css/lightbox.css') !!}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content">

        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> {{get_option('app')}}
                        <small class="pull-right">Date: {{date('d/m/Y', strtotime($order->created_at))}}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            {{--Info--}}
            <div class="row">
                <div class="col-xs-12">
                    <div class="callout callout-info">
                        <h4><i class="glyphicon glyphicon-exclamation-sign"></i> Notice</h4><a href="#" style="text-decoration: none" class="btn btn-xs btn-success btn-flat pull-right"><i class="fa fa-save"></i> Update Order Status</a>
                        <p>Order processing status :  <strong>{{\App\Status::lists('name','id')[$order->status]}}</strong>   </p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>{{$order->first_name}} {{$order->last_name}}</strong><br>
                        {{nl2br($order->address)}}<br>
                        {{$order->city}}, {{$order->state}} - {{$order->postcode}}<br>
                        Phone: {{$order->phone}}<br/>
                        Email: {{\App\User::find($order->user_id)->first()->email}}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-sm-push-4 invoice-col">
                    <b>Invoice #{{$order->id}}</b><br/>
                    <br/>
                    <b>Order ID:</b> {{$order->order_number}}<br/>
                    <b>Status :</b> <label class="{{\Illuminate\Support\Facades\Config::get('status.'.$order->status)}}">{{\App\Status::lists('name','id')[$order->status]}}</label>
                        <br/>
                    <b>Account:</b> {{\App\User::find($order->user_id)->first()->name}}
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Quantity</th>
                            <th>Rate (per Kg)</th>
                            <th>Garbage Types</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->quantity}}
                                <small>Kg</small>
                            </td>
                            <td>{{get_option('rate')}}</td>
                            <td>
                                @forelse($order->types()->get() as $type)
                                    <label class="label label-primary">{{\App\GarbageType::find($type->type_id)->name}}</label>

                                @empty
                                    <code>N/A</code>
                                @endforelse
                            </td>
                            <td>${{$order->amount}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            @forelse($order->attachments()->get() as $photo)
                <a href="{{asset($photo->source_path)}}" data-lightbox="{{$order->order_number}}"
                   data-title="{{$order->map}}">
                    <img src="{{asset($photo->source_path)}}" class="img-responsive thumbnail pull-left"
                         style="width: 20%; margin-right: 10px;" alt="{{$order->map}}"/>
                </a>

            @empty
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="pad margin no-print">
                                <div class="callout callout-warning" style="margin-bottom: 0!important;">
                                    <h4><i class="fa fa-exclamation-triangle"></i> Info:</h4>
                                    There is no photos attached with this Order
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
                        <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        {{--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>--}}
                            {{--Print</a>--}}
                        {{--<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment--}}
                        {{--</button>--}}
                        {{--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i--}}
                                    {{--class="fa fa-download"></i>--}}
                            {{--Generate PDF--}}
                        {{--</button>--}}
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </section>
@endsection

@section('js')
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.1/js/lightbox.js') !!}

@endsection