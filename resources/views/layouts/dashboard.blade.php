<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/image/serabine.ico') }}">
  <link rel="icon" type="image/png" href="{{ URL::asset('assets/image/serabine.ico') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Serabine.co
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('DataTables/datatables.min.css') }}">
  <link href="{{ URL::asset('assets/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ URL::asset('assets/demo/demo.css" rel="stylesheet') }}" />
</head>

<body class="">
  <div class="wrapper ">
    @include('inc.sidebar')
    <div class="main-panel" id="main-panel">
        @include('inc.navbar')
        @yield('content')
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->


  <script type="text/javascript" charset="utf8" src="{{ URL::asset('DataTables/datatables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ URL::asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ URL::asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ URL::asset('assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript') }}"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ URL::asset('assets/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>
