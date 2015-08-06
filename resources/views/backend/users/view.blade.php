@extends('backend.layouts.default')

@section('title')
    User Management :: {{$user->name}}'s profile review
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$user->name}}'s details
            <small>View and Verify user profile</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('users')}}"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">{{$user->name}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>
                                    Username
                                </th>
                                <td>
                                    {{$user->name}}
                                </td>
                                <th>
                                    Full name
                                </th>
                                <td>
                                    @if(!empty($user->first_name))
                                        {{$user->first_name}} {{$user->last_name}}
                                    @else
                                        <code>N/A</code>
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Email
                                </th>
                                <td>
                                    {{$user->email}}
                                </td>
                                <th>
                                    Phone
                                </th>
                                <td>
                                    {{$user->phone}}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Address
                                </th>
                                <td>
                                    @if(!empty($user->address))
                                        {!! nl2br($user->address) !!}<br/>
                                        {{$user->city}}, {{$user->state}} - {{$user->postcode}}
                                    @else
                                        <code>N/A</code>
                                    @endif
                                </td>
                                <th>
                                    Account Created
                                </th>
                                <td>
                                    {{$user->created_at->diffForHumans()}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Created Orders
                                </th>
                                <td>
                                    {{$user->orders()->count()}}
                                </td>
                                <th>
                                    Account Last Updated
                                </th>
                                <td>
                                    {{$user->updated_at->diffForHumans()}}
                                </td>
                            </tr>
                            {{--<td>--}}
                            {{--<a href="#" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> </a>--}}
                            {{--<a href="{{route('edit-user',$user->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> </a>--}}
                            {{--<a href="{{route('delete-user',$user->id)}}" class="btn btn-xs btn-danger {{($user->id == 1)?'disabled':''}}" {{($user->id == 1)?'disabled':''}}><i class="fa fa-trash"></i> </a>--}}
                            {{--</td>--}}
                            </tr>
                            </tbody>
                        </table>
                        <div class="clearfix"></div><br />
                        <div class="btn-group">
                            <a href="{{route('edit-user',$user->id)}}" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> Edit Profile </a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection