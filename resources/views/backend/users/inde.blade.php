@extends('backend.layouts.default')

@section('title')
    User Management
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Management
            <small>Manage your staff and customer</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        {!! Form::open(['url'=>route('users'),'method'=>'get']) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="{{(Request::has('q'))?Request::get('q'):''}}" placeholder="Search with username, name, email, address or phone number">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-flat" type="submit"><i class="fa fa-search"></i> </button>
                                <a class="btn btn-primary btn-flat" href="{{Request::url()}}" ><i class="fa fa-refresh"></i> Reset Search </a>
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $k => $user)
                                <tr>
                                    <td>
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        @if(!empty($user->first_name))
                                            {{$user->first_name}} {{$user->last_name}}
                                        @else
                                            <code>N/A</code>
                                        @endif

                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->phone}}
                                    </td>
                                    <td>
                                        @if(!empty($user->address))
                                            {{nl2br($user->address)}}<br/>
                                            {{$user->city}}, {{$user->state}} - {{$user->postcode}}
                                        @else
                                            <code>N/A</code>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('view-user',$user->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> </a>
                                        <a href="{{route('edit-user',$user->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> </a>
                                        <a href="{{route('delete-user',$user->id)}}" class="btn btn-xs btn-danger {{($user->id == 1)?'disabled':''}}" {{($user->id == 1)?'disabled':''}}><i class="fa fa-trash"></i> </a>
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
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! $users->appends(Request::except('page'))->render() !!}

                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection