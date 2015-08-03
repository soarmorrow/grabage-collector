{{--@if ($errors->any())--}}
    {{--<div class="mdl-grid">--}}
        {{--<div class="mdl-cell mdl-cell--12-col">--}}
            {{--<div class="alert alert-error alert-block notify">--}}
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
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="alert alert-success alert-block notify">
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored close pull-right" style="width: 35px;min-width: 35px;height: 35px" data-dismiss="alert">
                    <i class="material-icons">close</i>
                </button>
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="alert alert-danger alert-block notify">
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored close pull-right" style="width: 35px;min-width: 35px;height: 35px" data-dismiss="alert">
                    <i class="material-icons">close</i>
                </button>
                <!--<h4>Error</h4>-->
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="alert alert-warning alert-block notify">
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored close pull-right" style="width: 35px;min-width: 35px;height: 35px" data-dismiss="alert">
                    <i class="material-icons">close</i>
                </button>
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="col-md-12">
                <div class="alert alert-info alert-block notify">
                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored close pull-right" style="width: 35px;min-width: 35px;height: 35px" data-dismiss="alert">
                        <i class="material-icons">close</i>
                    </button>
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
@endif
