{{--@if ($errors->any())--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<div class="alert alert-error notify">--}}
{{--<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored close pull-right" style="width: 35px;min-width: 35px;height: 35px" data-dismiss="alert">--}}
{{--<i class="material-icons">close</i>--}}
{{--</button>--}}
{{--<h4>Error</h4>--}}
{{--Please check the form below for errors--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endif--}}

@if ($message = Session::get('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="pad margin no-print">
                <div class="callout callout-success" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-save"></i> Success:</h4>
                    {{$message}}
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="row">
        <div class="col-md-12">
            <div class="pad margin no-print">
                <div class="callout callout-danger" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-exclamation-triangle"></i> Error:</h4>
                    {{$message}}
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="row">
        <div class="col-md-12">
            <div class="pad margin no-print">
                <div class="callout callout-warning" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-exclamation-triangle"></i> Warning:</h4>
                    {{$message}}
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="pad margin no-print">
                    <div class="callout callout-warning" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-exclamation-triangle"></i> Info:</h4>
                        {{$message}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
