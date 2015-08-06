
@if ($message = Session::get('success'))
    <script type="text/javascript">
        toastr["success"]("{{$message}}");
    </script>
@endif

@if ($message = Session::get('error'))
    <script type="text/javascript">
        toastr["error"]("{{$message}}");
    </script>
@endif

@if ($message = Session::get('warning'))
    <script type="text/javascript">
        toastr["warning"]("{{$message}}");
    </script>
@endif

@if ($message = Session::get('info'))
    <script type="text/javascript">
        toastr["info"]("{{$message}}");
    </script>
@endif
