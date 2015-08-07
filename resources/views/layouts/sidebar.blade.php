
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <header class="demo-drawer-header">
        <img src="{{url('backend/dist/img/user2-160x160.jpg')}}" class="demo-avatar">
        <div class="demo-avatar-dropdown">
            <span>{{Auth::user()->email}} ({{Auth::user()->phone}})</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons">arrow_drop_down</i>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                <a href="{{route('profile',[Auth::user()->name])}}" class="mdl-menu__item">@lang('account.profile')</a>
                <a href="{{route('account',[Auth::user()->name])}}?option=email" class="mdl-menu__item">@lang('account.change_email')</a>
                <a href="{{route('account',[Auth::user()->name])}}?option=phone" class="mdl-menu__item">@lang('account.change_mobile')</a>
                <a href="{{route('change_password',[Auth::user()->name])}}" class="mdl-menu__item">@lang('account.change_password')</a>
                <a href="{{url('auth/logout')}}" class="mdl-menu__item">@lang('account.logout')</a>
            </ul>
        </div>
    </header>
    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
        @if(Auth::user()->roles()->first()->role_id == 1)
            <a class="mdl-navigation__link" href="{{url('admin')}}"><i class="mdl-color-text--blue-grey-400 material-icons">dashboard</i>Admin</a>
        @endif
        <a class="mdl-navigation__link" href="{{route('home')}}"><i class="mdl-color-text--blue-grey-400 material-icons">home</i>Home</a>
        <a class="mdl-navigation__link" href="{{url('order/list')}}"><i class="mdl-color-text--blue-grey-400 material-icons">assignment</i>Order</a>
        {{--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">delete</i>Trash</a>--}}
        {{--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">report</i>Spam</a>--}}
        {{--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">forum</i>Forums</a>--}}
        {{--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">flag</i>Updates</a>--}}
        {{--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">local_offer</i>Promos</a>--}}
        {{--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">shopping_cart</i>Purchases</a>--}}
        {{--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">people</i>Social</a>--}}
        <div class="mdl-layout-spacer"></div>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons">help_outline</i></a>
    </nav>
</div>