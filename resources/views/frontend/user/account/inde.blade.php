<style>
    .mdl-cell{
        max-width: 100%;
        overflow-x: auto;
    }
</style>
@extends('layouts.default')

@section('title')
    Manage your profile
@endsection


@section('content')

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--1-col"></div>
        <div class="mdl-cell mdl-cell--9-col mdl-animation--default">

            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--middle">
                <tbody>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">
                        username
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        {{$user->name}}
                    </td>
                    <th class="mdl-data-table__cell--non-numeric">
                        email
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        {{$user->email}}
                    </td>
                </tr>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">
                        First Name
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        {{$user->first_name}}
                    </td>
                    <th class="mdl-data-table__cell--non-numeric">
                        Last Name
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        {{$user->last_name}}
                    </td>
                </tr>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">
                        Phone
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        {{$user->phone}}
                    </td>
                    <th class="mdl-data-table__cell--non-numeric">
                        address
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        {!! nl2br($user->address) !!}<br/>
                        {{$user->city}},{{$user->state}} - {{$user->postcode}}
                    </td>
                </tr>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">
                        You have been with us for
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        {{$user->created_at->diffForHumans()}}
                    </td>
                    <th class="mdl-data-table__cell--non-numeric">
                        Last profile update
                    </th>
                    <td class="mdl-data-table__cell--non-numeric">
                        @if($user->updated_at == '0000-00-00 00:00:00')
                            <code>
                                Never updated
                            </code>
                        @else
                            {{$user->updated_at->diffForHumans()}}
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
            <br />
            <a href="{{route('account',$user->name)}}" class="mdl-button mdl-button--raised mdl-button--colored mdl-button--primary mdl-js-button mdl-js-ripple-effect pull-right">Update profile</a>

        </div>
    </div>
@endsection