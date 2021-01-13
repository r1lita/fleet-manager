<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ config('app.name') }}</title>

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Technicut') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ url('/') }}/js/app.js" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ url('/') }}/public/css/app.css" rel="stylesheet"> --}}

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('/') }}/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/admin-lte/dist/css/adminlte.min.css">
  <!-- Include Bootstrap Datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.inc.header')
  @include('layouts.inc.left-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Menu</h5>
        Sidebar content
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      v 0.1
    </div>
    <!-- Default to the left -->
    Copyright &copy; 2020 Technicut SAS
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ url('/') }}/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- date picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/admin-lte/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#startdate_datepicker").datepicker({
      format: "yyyy-mm-dd"
    });
    $("#enddate_datepicker").datepicker({
      format: "yyyy-mm-dd"
    });

    // onclick display
    $('#display-logs').click(function(e) {
      var startDate = $("#startdate_datepicker").val();
      var endDate = $("#enddate_datepicker").val();
      var baseUrl = '{{ url('/') }}/calls/list/' + startDate + '/' + endDate;
      //alert(startDate);
      window.location.href = baseUrl;
      e.preventDefault(); // prevents default
      return false; // al
    });

    // onclick import
    $('#import-logs').click(function(e) {
      var startDate = $("#startdate_datepicker").val();
      var endDate = $("#enddate_datepicker").val();
      var baseUrl = '{{ url('/') }}/calls/downloadlogs/' + startDate + '/' + endDate;
      //alert(startDate);
      window.location.href = baseUrl;
      e.preventDefault(); // prevents default
      return false; // al
    });

    // onclick export
    $('#export-logs').click(function(e) {
      var startDate = $("#startdate_datepicker").val();
      var endDate = $("#enddate_datepicker").val();
      var baseUrl = '{{ url('/') }}/calls/export/' + startDate + '/' + endDate;
      //alert(startDate);
      window.location.href = baseUrl;
      e.preventDefault(); // prevents default
      return false; // al
    });
  });
</script>
</body>
</html>
