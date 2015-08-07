
<header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">GC</span>
        <div class="mdl-layout-spacer"></div>
        {!! Form::open(['url'=>route('search'),'method'=>'get']) !!}
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" name="q" value="{{Request::get('q',null)}}" required id="search" />
                <label class="mdl-textfield__label" for="search">Search your order</label>
            </div>
        </div>
        {!! Form::close() !!}
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item about">About</li>
            <li class="mdl-menu__item contact">Contact</li>
            <li class="mdl-menu__item legal">Legal information</li>
        </ul>
    </div>
</header>


