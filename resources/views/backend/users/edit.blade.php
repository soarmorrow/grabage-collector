@extends('backend.layouts.default')

@section('title')
    Add new User
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add a new staff or customer
            <small>Manage your staff and customer</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('users')}}"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <div id="map_canvas" style="height: 250px;"></div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        {!! Form::open() !!}

                        {{--Map--}}
                        <div class="col-md-6">
                            <div class="input-group {{($errors->has('map')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control" value="{{$user['map']}}" id="map" name="map" placeholder="">
                            </div>
                            {!!$errors->has('map')?'<small class="text-danger">'.$errors->first('map').'</small>':''!!}
                        </div>


                        {{--Email--}}
                        <div class="col-md-6">
                            <div class="input-group  {{($errors->has('email')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-envelope"></i></span>
                                <input required="required" value="{{$user['email']}}" type="text" class="form-control" name="email" placeholder="user@somedomain.com">
                            </div>
                            {!!$errors->has('email')?'<small class="text-danger">'.$errors->first('email').'</small>':''!!}
                        </div>

                        <div class="clearfix"></div>
                        <br />
                        {{--First name--}}
                        <div class="col-md-6">
                            <div class="input-group {{($errors->has('first_name')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                                <input required="required"  value="{{$user['first_name']}}"  type="text" class="form-control" id="first_name" name="first_name" placeholder="John">
                            </div>
                            {!!$errors->has('first_name')?'<small class="text-danger">'.$errors->first('first_name').'</small>':''!!}
                        </div>

                        {{--Last name--}}
                        <div class="col-md-6">
                            <div class="input-group {{($errors->has('last_name')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                                <input required="required" type="text"  value="{{$user['last_name']}}"  class="form-control" id="last_name" name="last_name" placeholder="Doe">
                            </div>
                            {!!$errors->has('last_name')?'<small class="text-danger">'.$errors->first('last_name').'</small>':''!!}
                        </div>

                        <div class="clearfix"></div>
                        <br />
                        {{--Password--}}
                        <div class="col-md-6">
                            <div class="input-group {{($errors->has('password')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-key"></i></span>
                                <input type="password"  value="{{old('password')}}"  class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            {!!$errors->has('password')?'<small class="text-danger">'.$errors->first('password').'</small>':''!!}
                        </div>

                        {{--Confirm password--}}
                        <div class="col-md-6">
                            <div class="input-group {{($errors->has('confirm_password')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-key"></i></span>
                                <input type="password"  value="{{old('confirm_password')}}"  class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            {!!$errors->has('confirm_password')?'<small class="text-danger">'.$errors->first('confirm_password').'</small>':''!!}
                        </div>

                        <div class="clearfix"></div><br />
                        {{--Username--}}
                        <div class="col-md-6">
                            <div class="input-group {{($errors->has('name')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-tag"></i></span>
                                <input type="text" required value="{{$user['name']}}" placeholder="Username" id="name" class="form-control" name="name">
                            </div>
                            {!!$errors->has('name')?'<small class="text-danger">'.$errors->first('name').'</small>':''!!}
                        </div>

                        {{--Roles--}}
                        <div class="col-md-6">
                            <div class="input-group {{($errors->has('roles')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-sitemap"></i></span>
                                {!! Form::select('roles', get_roles(), \App\User::find($user['id'])->first()->role_id ,['class'=>'form-control']) !!}
                            </div>
                            {!!$errors->has('roles')?'<small class="text-danger">'.$errors->first('roles').'</small>':''!!}
                        </div>
                        <div class="clearfix"></div><br />

                        {{--Address--}}
                        <div class="col-md-12">
                            <div class="input-group {{($errors->has('address')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-home"></i></span>
                                <textarea required="required" class="form-control" id="address" name="address" placeholder="Larkin Fork, 282 Kevin Brook, Apt. 672">{{$user['address']}}</textarea>
                            </div>
                            {!!$errors->has('address')?'<small class="text-danger">'.$errors->first('address').'</small>':''!!}
                        </div>


                        <div class="clearfix"></div><br />

                        {{--City--}}
                        <div class="col-md-3">
                            <div class="input-group {{($errors->has('city')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-street-view"></i></span>
                                <input required="required" type="text"  value="{{$user['city']}}"  class="form-control" id="city" name="city" placeholder="Kochi">
                            </div>
                            {!!$errors->has('city')?'<small class="text-danger">'.$errors->first('city').'</small>':''!!}
                        </div>

                        {{--State--}}
                        <div class="col-md-3">
                            <div class="input-group {{($errors->has('state')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-map-marker"></i></span>
                                <input required="required" type="text"  value="{{$user['state']}}"  class="form-control" id="state" name="state" placeholder="Kerala">
                            </div>
                            {!!$errors->has('state')?'<small class="text-danger">'.$errors->first('state').'</small>':''!!}
                        </div>

                        {{--Post Code--}}
                        <div class="col-md-3">
                            <div class="input-group {{($errors->has('postcode')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-institution"></i></span>
                                <input required="required" type="text"  value="{{$user['postcode']}}"  class="form-control" id="postcode" name="postcode" placeholder="682020">
                            </div>
                            {!!$errors->has('postcode')?'<small class="text-danger">'.$errors->first('postcode').'</small>':''!!}
                        </div>

                        {{-- Mobile Number--}}
                        <div class="col-md-3">
                            <div class="input-group {{($errors->has('phone')?'has-error':'')}}">
                                <span class="input-group-addon"> <i class="fa fa-mobile"></i></span>
                                <input required="required" type="text"  value="{{$user['phone']}}"  class="form-control" id="phone" name="phone" placeholder="(999) 536-2824">
                            </div>
                            {!!$errors->has('phone')?'<small class="text-danger">'.$errors->first('phone').'</small>':''!!}
                        </div>

                        <div class="clearfix"></div><br />
                        <div class="col-md-12">

                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-edit"></i>  Update</button>

                            <button onclick="history.go(-1);" type="button" style="margin-right: 10px" class="btn btn-danger pull-right"><i class="fa fa-undo"></i>  Cancel</button>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection

@section('js')
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{{asset('js/plugins/jquery.geocomplete.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.maskedinput.min.js')}}"></script>
    <script>
        $(function () {

            $("input[name='phone']").mask("(999) 999-9999");
            var geocoder = new google.maps.Geocoder();
            var options = {
                map: "#map_canvas",
                location: "{{!empty($user['map'])?$user['map']:"Kochi"}}",
                markerOptions: {
                    draggable: true
                }
            };
            var map = $("#map");
            map.geocomplete(options)
                    .bind("geocode:result", function (event, result) {
                        $("input[name=latitude]").val(result.geometry.location.lat());
                        $("input[name=longitude]").val(result.geometry.location.lng());
                        codeLatLng(result.geometry.location, false);
                    });

            map.bind("geocode:dragged", function (event, latLng) {
                $("input[name=latitude]").val(latLng.lat());
                $("input[name=latitude]").val(latLng.lng());
                codeLatLng(latLng, true);
            });

            function codeLatLng(latlng, update_text_field) {
                geocoder.geocode({'latLng': latlng}, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    if (update_text_field) {
                                        $("#map").val(results[0].formatted_address);
                                    }
                                    var address = results[0].address_components;
                                    for (var i = 0; i < address.length; i++) {
                                        if (jQuery.inArray("postal_code", address[i].types) != -1) {
                                            $('input[name="postcode"]').val(address[i].long_name)
                                        }
                                        else if (jQuery.inArray("administrative_area_level_1", address[i].types) != -1) {
                                            $('input[name="state"]').val(address[i].long_name)
                                        }
                                        else if (jQuery.inArray("locality", address[i].types) != -1) {
                                            $('textarea[name="address"]').val(address[i].long_name)
                                        }
                                        else if (jQuery.inArray("administrative_area_level_2", address[i].types) != -1) {
                                            $('input[name="city"]').val(address[i].long_name)
                                        } else if (jQuery.inArray("sublocality_level_1", address[i].types) != -1) {
                                            var input_address = $('textarea[name="address"]');
                                            input_address.val(input_address.val() + " - " + address[i].long_name);
                                        }
                                    }
                                } else {
                                    console.log('No results found');
                                }
                            } else {
                                console.log('Geocoder failed due to: ' + status);
                            }
                        }
                );
            }
        });
    </script>
@endsection