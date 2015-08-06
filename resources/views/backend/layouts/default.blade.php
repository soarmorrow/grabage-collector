{{--Head--}}
@include('backend.partials.head')

{{--Header--}}
@include('backend.partials.header')

{{--Sidebar--}}
@include('backend.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @yield('content')

</div>
<!-- /.content-wrapper -->


@include('backend.partials.footer')

