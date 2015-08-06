@extends('backend.layouts.default')

@section('title')
    Application Settings
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Processing Status
            <small>Manage system processing status settings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Status</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h5>Create New Status for Process</h5>
                    </div>
                    <div class="box-body">
                        <div class="add">
                            {!! Form::open(['url'=>route('status'),'method'=>'post']) !!}
                            <div class="input-group {{$errors->has('name')?'has-error':''}}">
                                {!!
                                Form::input('text','name',null,['type'=>'text','required'=>'required','class'=>'form-control','placeholder'=>'New processing status']) !!}
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-flat" type="submit"> Add A New Status</button>
                            </span>
                            </div>

                            {!!$errors->has('name')?'<span class="text-danger">'.$errors->first('name').'</span>':''!!}
                        </div>

                        {!! Form::close() !!}
                        <div class="hide edit">
                            {!! Form::open(['url'=>route('edit-status'),'method'=>'post']) !!}
                            <div class="input-group ">
                                <input type="hidden" value="" name="id">
                                {!!
                                Form::input('text','name',null,['type'=>'text','required'=>'required','class'=>'form-control','placeholder'=>'New processing status']) !!}
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-flat" type="submit"> Update Status</button>
                            </span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- /.box -->

                <div class="box box-success">
                    <div class="box-header">
                        {!! Form::open(['url'=>route('status'),'method'=>'get']) !!}
                        <div class="input-group">
                            {!!
                            Form::input('text','q',Request::get('q',NULL),['type'=>'text','class'=>'form-control','placeholder'=>'Search Status']) !!}
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-flat" type="submit"> <i class="glyphicon glyphicon-search"></i> Search</button>
                                <a href="{{Request::url()}}" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-refresh"></i> Reset Search</a>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @forelse($statuses as $status)
                                    <tr>
                                        <td>{{$status->id}}</td>
                                        <td>{{$status->name}}</td>
                                        <td>
                                            <a href="{{route('edit-status')}}" data-id="{{$status->id}}" data-name="{{$status->name}}" class="btn btn-xs btn-success btn-edit"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="{{route('delete-status',$status->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                            {!! $statuses->appends(Request::only('q'))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(function(){
            $(".btn-edit").on('click', function(evt){
                evt.preventDefault();
                $('input[name="id"]').val($(this).data('id'));
                $('input[name="name"]').val($(this).data('name'));
                $(".add").hide();
                $(".edit").removeClass('hide');
            });
        });
    </script>
@endsection