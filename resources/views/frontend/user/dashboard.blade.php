@extends('layouts.default')

@section('title')
    Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css"/>
    <link rel="stylesheet" href="{{asset('plugins/dropzone/dropzone.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/paper-collapse.css')}}"/>
@endsection

@section('content')

    <div class="mdl-grid demo-content">
        <div class="demo-graphs mdl-shadow--2dp mdl-cell mdl-cell--12-col">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['url'=>route('save-order'),"files"=>true]) !!}
            {{--Select location--}}
            <div class="collapse-card location">
                <div class="collapse-card__heading">
                    <div class="collapse-card__title">
                        <i class="fa fa-map-marker fa-2x fa-fw"></i>
                        Select Location
                    </div>
                </div>
                <div class="collapse-card__body">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col">

                            <label for="remember"
                                   class="pull-left mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect my_address">Select
                                My account address as destination</label>

                            <div class="clearfix"></div>
                            <hr/>
                            {{--Map--}}
                            <div id="map_canvas"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                <input class="mdl-textfield__input" type="text" required name="map" id="map"
                                       autocomplete="off"/>
                                <label class="mdl-textfield__label" for="map">Where are you?</label>
                            </div>

                            {{--Firstname and Lastname--}}
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input class="mdl-textfield__input" type="text" name="first_name"/>
                                        <label class="mdl-textfield__label" for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input class="mdl-textfield__input" type="text" name="last_name"/>
                                        <label class="mdl-textfield__label" for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            {{--Address--}}
                            <div class="mdl-grid--no-spacing">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <textarea required class="mdl-textfield__input" type="text"
                                                  name="address"></textarea>
                                        <label class="mdl-textfield__label" for="address">Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--3-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input required class="mdl-textfield__input" type="text" name="city"/>
                                        <label class="mdl-textfield__label" for="city">City</label>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--3-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input required class="mdl-textfield__input" type="text" name="state"/>
                                        <label class="mdl-textfield__label" for="state">State</label>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--3-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input required class="mdl-textfield__input" type="text" name="postcode"/>
                                        <label class="mdl-textfield__label" for="postcode">Postal Code</label>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--3-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input class="mdl-textfield__input" type="text" name="phone"/>
                                        <label class="mdl-textfield__label" for="phone">Mobile Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <div class="pull-right">
                                        <button type="button"
                                                class="pull-right mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect step1">
                                            Next step
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Choose weight and upload image --}}
            <div class="collapse-card quantity">
                <div class="collapse-card__heading">
                    <div class="collapse-card__title">
                        <i class="fa fa-image fa-2x fa-fw"></i>
                        Specify Quantity
                    </div>
                </div>
                <div class="collapse-card__body">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col">
                            {{--Firstname and Lastname--}}
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col">
                                    <div id="image" class=" dropzone"></div>
                                    <div class="dz-upload-images hide"></div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input required class="mdl-textfield__input" step="0.01" min="0" type="number"
                                               name="quantity"/>
                                        <label class="mdl-textfield__label" for="quantity">How much does it
                                            weigh? (in Kg) </label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <input required class="mdl-textfield__input disabled" step="0.01" min="0"
                                               type="number" name="amount" value="0" readonly/>
                                        <label class="mdl-textfield__label" for="amount">Total Amount</label>
                                    </div>

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        {!! Form::select('types[]', \App\GarbageType::lists('name','id'),1,
                                        ['class'=>'mdl-textfield__input
                                        chosen-select','multiple'=>true,'data-placeholder'=>'Select
                                        Type']) !!}
                                        <label class="mdl-textfield__label" for="type">Garbage Type</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="pull-right">
                                <button type="button"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect  step2_back">
                                    Prev Step
                                </button>
                                <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect step3">
                                    Proceed to Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/plugins/paper-collapse.js')}}"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{{asset('js/plugins/jquery.geocomplete.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
    <script>
        var rate = {{get_option('rate')}};
        $(function () {

            $(".alert-danger").delay(5000).slideUp(function () {
                $(this).remove();
            });

            window.files = {};
            $("div#image").dropzone({
                init: function () {
                    this.on("complete", function (file) {
                        var confirm_order = $(".step3");
                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

                                confirm_order.attr('disabled',false);
                                console.log('enabled');
                        }else{
                            confirm_order.attr('disabled',true);
                            console.log('disabled');
                        }
                    });
                },
                url: "{{route('image-upload')}}",
                headers: {
                    'X-CSRF-Token': "{{csrf_token()}}"
                },
                maxFilesize: 2,
                acceptedFiles: ".jpg,.png,.bmp,.gif,.jpeg,.tif",
                success: function (response, xhr) {
                    xhr = JSON.parse(xhr);
                    window.files[response.name] = xhr.file_path;
                    if (xhr.code == 200) {
                        $hidden = '<input type="hidden" name="images[]" value="' + xhr.file_path + '" >';
                        $(".dz-upload-images").append($hidden);
                        toastr["success"]("Image added to upload list");
                    }
                },
                addRemoveLinks: true,
                dictRemoveFile: "Remove Image",
                removedfile: function (file) {
                    var path = window.files[file.name];
                    $.ajax({
                        type: 'POST',
                        url: '{{route('image-delete')}}',
                        data: "file_path=" + path,
                        dataType: 'json',
                        success: function (data, xhr) {
                            window.files[file.name] = null;
                            toastr["error"]("Image removed from upload list");
                            if (data.code == 200) {
                                $('input[value="' + path + '"]').remove();
                            }
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }
            });

            // mask input
            $("input[name='phone']").mask("(999) 999-9999");

            // Paper collapse
            $('.collapse-card').paperCollapse();
            $location = $(".location");
            $quantity = $(".quantity");
            //  $checkout = $(".checkout");
            $location.find('.collapse-card__title').trigger('click');

            $('.step1').on('click', function (evt) {
                openPaper($quantity)
            });

//            $('.step2').on('click', function (evt) {
//                openPaper($checkout)
//            });

            $('.step2_back').on('click', function (e) {
                openPaper($location);
            });
            $('.step3_back').on('click', function (e) {
                openPaper($quantity);
            });

            $(document).on('keyup', "input[name='quantity']", function () {
                console.log($quantity.val());
                $("input[name='amount']").val(Math.round((parseFloat($(this).val()) * rate) * 100) / 100);
            });

            $location.find('.collapse-card__title').on('click', function () {
                closePaper($quantity);
                // closePaper($checkout);
            });
            $quantity.find('.collapse-card__title').on('click', function () {
                closePaper($location);
                // closePaper($checkout);
            });
//            $checkout.find('.collapse-card__title').on('click', function () {
//                closePaper($quantity);
//                closePaper($location);
//            });

            var closePaper = function ($selector) {
                if ($selector.hasClass('active')) {
                    $selector.find('.collapse-card__title').trigger('click');
                }
            };
            var openPaper = function ($selector) {
                if (!$selector.hasClass('active')) {
                    $selector.find('.collapse-card__title').trigger('click');
                }
            };

            // chosen
            $("select[name='types[]']").chosen({width: "inherit"});

            // set my address
            $(document).on('click', '.my_address', function () {
                $("input[name='map']").val("{!! Auth::user()->map !!}");
                $("input[name='email']").val("{{Auth::user()->email}}");
                $("input[name='first_name']").val("{{Auth::user()->first_name}}");
                $("input[name='last_name']").val("{{Auth::user()->last_name}}");
                $("textarea[name='address']").val("{{ trim(preg_replace('/\s+/', ' ', Auth::user()->address)) }}");
                $("input[name='city']").val("{{Auth::user()->city}}");
                $("input[name='state']").val("{{Auth::user()->state}}");
                $("input[name='postcode']").val("{{Auth::user()->postcode}}");
                $("input[name='phone']").val("{{Auth::user()->phone}}");
            });
        });
        var geocoder = new google.maps.Geocoder();
        var options = {
            map: "#map_canvas",
            location: "Kochi",
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
            )
        }

    </script>
@endsection