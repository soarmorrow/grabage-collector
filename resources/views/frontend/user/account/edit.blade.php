@extends('layouts.default')

@section('title')
    Manage your profile
@endsection


@section('content')

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">

            {!! Form::open(['url'=>route('account',[Auth::user()->name]),'method'=>'post']) !!}
            {{--Map--}}
            <div id="map_canvas"></div>

            {{--Location and email--}}
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input class="mdl-textfield__input" type="text" required name="map" id="map"
                               autocomplete="off"/>
                        <label class="mdl-textfield__label" for="map">Pick my location</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input class="mdl-textfield__input" type="email" value="{{!empty(Auth::user()->email)?Auth::user()->email:""}}" required name="email" id="email"
                               autocomplete="on"/>
                        <label class="mdl-textfield__label" for="email">Email Address</label>
                    </div>
                </div>
            </div>

            {{--Firstname and Lastname--}}
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="text" value="{{!empty(Auth::user()->first_name)?Auth::user()->first_name:""}}" name="first_name"/>
                        <label class="mdl-textfield__label" for="first_name">First Name</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="text" value="{{!empty(Auth::user()->last_name)?Auth::user()->last_name:""}}" name="last_name"/>
                        <label class="mdl-textfield__label" for="last_name">Last Name</label>
                    </div>
                </div>
            </div>

            {{--Address--}}
            <div class="mdl-grid--no-spacing">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <textarea required class="mdl-textfield__input" type="text"
                                                  name="address">{{!empty(Auth::user()->address)?Auth::user()->address:""}}</textarea>
                        <label class="mdl-textfield__label" for="address">Address</label>
                    </div>
                </div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--3-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="text" value="{{!empty(Auth::user()->city)?Auth::user()->city:""}}" name="city"/>
                        <label class="mdl-textfield__label" for="city">City</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--3-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="text" value="{{!empty(Auth::user()->state)?Auth::user()->state:""}}" name="state"/>
                        <label class="mdl-textfield__label" for="state">State</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--3-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="text" value="{{!empty(Auth::user()->postcode)?Auth::user()->postcode:""}}" name="postcode"/>
                        <label class="mdl-textfield__label" for="postcode">Postal Code</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--3-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                        <input required class="mdl-textfield__input" type="text" value="{{!empty(Auth::user()->phone)?Auth::user()->phone:""}}" name="phone"/>
                        <label class="mdl-textfield__label" for="phone">Mobile Number</label>
                    </div>
                </div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="pull-right">
                        <button type="submit"
                                class="pull-right mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect step1">
                            Update
                        </button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('js')
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{{asset('js/plugins/jquery.geocomplete.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.maskedinput.min.js')}}"></script>
    <script>
        $(function(){

            $("input[name='phone']").mask("(999) 999-9999");
            var geocoder = new google.maps.Geocoder();
            var options = {
                map: "#map_canvas",
                location: "{{!empty(Auth::user()->map)?Auth::user()->map:"Kochi"}}",
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

            $(window).load(function () {
                map.removeAttr('placeholder');
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
                                        if (jQuery.inArray("postal_code", address[i].types) != -1 && {{!empty(Auth::user()->postcode) ? 'false':'true'}}) {
                                            $('input[name="postcode"]').val(address[i].long_name)
                                        }
                                        else if (jQuery.inArray("administrative_area_level_1", address[i].types) != -1 && {{!empty(Auth::user()->state)?'false':'true'}}) {
                                            $('input[name="state"]').val(address[i].long_name)
                                        }
                                        else if (jQuery.inArray("locality", address[i].types) != -1 && {{!empty(Auth::user()->address)?'false':'true'}}) {
                                            $('textarea[name="address"]').val(address[i].long_name)
                                        }
                                        else if (jQuery.inArray("administrative_area_level_2", address[i].types) != -1 && {{!empty(Auth::user()->city)?'false':'true'}}) {
                                            $('input[name="city"]').val(address[i].long_name)
                                        } else if (jQuery.inArray("sublocality_level_1", address[i].types) != -1 && {{!empty(Auth::user()->address)?'false':'true'}}) {
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

        $(window).load(function(){
            @if(\Illuminate\Support\Facades\Request::input('option'))
                $('input[name="{{\Illuminate\Support\Facades\Request::input('option')}}"]').focus();
            @endif
        });
    </script>
@endsection