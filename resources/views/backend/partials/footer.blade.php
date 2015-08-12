

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>&nbsp;</b>
    </div>
    <strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">{{get_option('app')?get_option('app'):'Garbage Collector'}}</a>.</strong> All rights
    reserved.
</footer>

<!-- ./wrapper -->
</div>
<!-- jQuery 2.1.4 -->
<script src="{{asset('backend/plugins/jQuery/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('backend/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{asset('backend/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/app.min.js')}}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{asset('backend/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('backend/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{asset('backend/plugins/chartjs/Chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/masonry/js/masonry.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/masonry/js/imagesloaded.pkgd.min.js')}}" type="text/javascript"></script>


{!! Html::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js') !!}

<script type="text/javascript">
    $('.grid1').imagesLoaded( function(){
      $('.grid1').masonry({
              // options
              itemSelector: '.grid-item1',
              isAnimated: true,
              isFitWidth: true,
              columnWidth: '.grid-item1',
              gutter: 10
          });
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@include('backend.partials.toastr')
@yield('js')

</body>
</html>