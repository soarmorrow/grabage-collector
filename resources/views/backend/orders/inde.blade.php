@extends('backend.layouts.default')

@section('title')
    Order Management
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order Management
            <small>Manage your received orders</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        {!! Form::open(['url'=>route('orders'),'method'=>'get']) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   value="{{(Request::has('q'))?Request::get('q'):''}}"
                                   placeholder="Search with name, email, address, phone number or order number">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-flat" type="submit"><i class="fa fa-search"></i>
                                </button>
                                <a class="btn btn-primary btn-flat" href="{{Request::url()}}"><i
                                            class="fa fa-refresh"></i> Reset Search </a>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Payment Type</th>
                                    <th>status</th>
                                    <th style="width: 100px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $k => $order)
                                    <tr>
                                        <td>
                                            {{$order->id}}
                                        </td>
                                        <td>
                                            @if(!empty($order->first_name))
                                                {{$order->first_name}} {{$order->last_name}}
                                            @else
                                                <code>N/A</code>
                                            @endif

                                        </td>
                                        <td>
                                            {{\App\User::find($order->user_id)->email}}
                                        </td>
                                        <td>
                                            {{$order->phone}}
                                        </td>
                                        <td>
                                            @if(!empty($order->address))
                                                {{nl2br($order->address)}}<br/>
                                                {{$order->city}}, {{$order->state}} - {{$order->postcode}}
                                            @else
                                                <code>N/A</code>
                                            @endif
                                        </td>

                                        <td>
                                            {{ \App\PaymentType::find($order->payment_type)->name }}
                                        </td>
                                        <td>
                                            <label class="{{\Illuminate\Support\Facades\Config::get('status.'.$order->status)}}">{{\App\Status::lists('name','id')[$order->status]}}</label>
                                        </td>
                                        <td>
                                            <a href="{{route('view-order',$order->id)}}" class="btn btn-xs btn-primary"><i
                                                        class="fa fa-eye"></i> </a>
                                            <a href="{{route('edit-order',$order->id)}}" class="btn btn-xs btn-success"><i
                                                        class="fa fa-edit"></i> </a>
                                            <a href="{{route('edit-order',$order->id)}}" class="btn btn-xs btn-info"><i
                                                        class="fa fa-refresh"></i> </a>
                                            @if($order->payment_type == 2)
                                                <a href="{{route('delete-order',$order->id)}}"
                                                   class="btn btn-xs btn-danger disabled"><i
                                                            class="fa fa-trash"></i> </a>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <p class="text-center">No Records found</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! $orders->appends(Request::except('page'))->render() !!}

                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection