<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li {{ Request::is('admin')? 'class=active':'' }} >
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ (Request::is('admin/users') || Request::is('admin/users/*'))? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li {{ Request::is('admin/users')? 'class=active':'' }}><a href="{{route('users')}}"><i class="fa fa-user"></i> All Users</a></li>
                    <li {{ Request::is('admin/users/add')? 'class=active':'' }}><a href="{{url('admin/users/add')}}"><i class="fa fa-user-plus"></i> Add User</a></li>
                </ul>
            </li>
            <li class="treeview {{ (Request::is('admin/orders') || Request::is('admin/orders/*'))? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Orders</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li {{ Request::is('admin/orders')? 'class=active':'' }}><a href="{{route('orders')}}"><i class="fa fa-list"></i> All Orders</a></li>
{{--                    <li {{ Request::is('admin/orders/add')? 'class=active':'' }}><a href="{{url('admin/orders/add')}}"><i class="fa fa-user-plus"></i> Review Orders</a></li>--}}
                </ul>
            </li>
            <li class="{{ (Request::is('admin/status'))? 'active':'' }}">
                <a href="{{url('admin/status')}}">
                    <i class="fa fa-hourglass-half"></i> <span>Status</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/types'))? 'active':'' }}">
                <a href="{{url('admin/types')}}">
                    <i class="fa fa-trash"></i> <span>Garbage Types</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/settings'))? 'active':'' }}">
                <a href="{{url('admin/settings')}}">
                    <i class="fa fa-gears"></i> <span>Settings</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
