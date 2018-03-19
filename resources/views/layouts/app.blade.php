
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | {{ @$page_title }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/pace/pace.min.css') }}">
  @yield('add-style')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .dataTables_length{
      display: none !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">
  @include('layouts.panel.header')
  @include('layouts.panel.sidebar')

  <div class="content-wrapper">
    @yield('content')
  </div>

  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

</div>

<script type="text/javascript" src="{{ asset('assets/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/PACE/pace.min.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/default/js/vendor/plugins/smoothscroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/dist/js/custom.js') }}"></script>
@if(session('message'))
<script type="text/javascript">swal("", "{{ session('message') }}", "success")</script>
@endif
@yield('add-js')
<script>
  $(document).ajaxStart(function () {
    Pace.restart()
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>