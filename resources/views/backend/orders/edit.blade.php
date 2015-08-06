@extends('backend.layouts.default')

@section('title')
    Order Management :: Progress report upgrade
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update The Progress Report
            <small>Mark progress orders</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('orders')}}"><i class="fa fa-list"></i> Orders</a></li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Update Progress of #<i>{{$order->id}}</i></h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-info">
                            <h3><i class="glyphicon glyphicon-alert"></i> Info</h3>
                            Current status of this order : <strong>{{\App\Status::lists('name','id')[$order->status]}}</strong>
                        </div>

                        {!! Form::open(['url'=>route('update-order',$order->id),'method'=>'post']) !!}
                        <div class="input-group {{$errors->has('status')?'has-error':''}}">
                            {!! Form::select('status', get_all_order_status(),$order->status,['class'=>'form-control']) !!}
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-flat" type="submit"> <i class="glyphicon glyphicon-save"></i> Update Progress</button>
                            </span>
                        </div>
                        {!! $errors->has('status')?'<span class="text-danger">'.$errors->first('status').'</span>':'' !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection