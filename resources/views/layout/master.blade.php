<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>GIS | @yield('title') </title>


  <link href="{{asset('template/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('template/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <link href="{{asset('template/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

  <link href="{{asset('template/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">


  <link href="{{asset('template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
    rel="stylesheet">

  <link href="{{asset('template/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />

  <link href="{{asset('template/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">


  <link href="{{asset('template/build/css/custom.min.css')}}" rel="stylesheet">

  <link href="{{asset('template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
    rel="stylesheet">
  <link href="{{asset('template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
    rel="stylesheet">
  <link href="{{asset('template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{asset('template/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{Session::get('full_name')}}</h2>
            </div>
          </div>
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li class=""><a><i class="fa fa-home"></i> Data Kasus Lakalintas <span
                      class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a class="{{ request()->is('admin/dashboard') ? 'active' : ''}}"
                        href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li><a class="{{ request()->is('admin/jeniskasus') ? 'active' : ''}}"
                        href="{{route('jeniskasus')}}"><i class="fa fa-book"></i> Jenis Kasus</a>
                    </li>
                    <li><a class="{{ request()->is('admin/kondisikorban') ? 'active' : ''}}"
                        href="{{route('kondisikorban')}}"><i class="fa fa-book"></i> Kondisi Korban</a>
                    </li>
                    <li><a class="{{ request()->is('admin/jalan') ? 'active' : ''}}" href="{{route('jalan')}}"><i
                          class="fa fa-road"></i> Jalan</a>
                    </li>
                  </ul>
                </li>
                <li><a class="{{ Route::is('Kasus.index') ? 'active' : ''}}" href="{{route('Kasus.index')}}"><i
                      class="fa fa-road"></i> Kasus Kriminal</a>
                </li>
                <li><a class="{{ Route::is('Web_Decsription.index') ? 'active' : ''}}"
                    href="{{route('Web_Decsription.index')}}"><i class="fa fa-road"></i> Web Decsription</a>
                <li><a class="{{ Route::is('Tkp.index') ? 'active' : ''}}" href="{{route('Tkp.index')}}"><i
                      class="fa fa-road"></i> TKP</a>
                </li>
                <li><a class="{{ Route::is('ContactUs.index') ? 'active' : ''}}" href="{{route('ContactUs.index')}}"><i
                      class="fa fa-phone"></i>Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
          </ul>
        </div>
      </div>
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>

    </div>
  </div>
  <div class="top_nav">
    <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
              data-toggle="dropdown" aria-expanded="false">
              <img src="{{asset('template/production/images/img.jpg')}}" alt="">{{ Session::get('full_name')}}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <button class="dropdown-item" data-toggle="modal" data-target="#logout"><i
                  class="fa fa-sign-out pull-right"></i> Log Out</button>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="right_col" role="main" style="min-height: 1736px;">
    @yield('content')
  </div>
  <footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>

  </div>
  </div>

  {{-- modal logout --}}
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logut</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3>Apakah anda yakin ingin logout?</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <a href="{{route('logout')}}" class="btn btn-danger">Ya</a>
        </div>
      </div>
    </div>
  </div>
  {{-- end modal logout --}}

  <!-- jQuery -->
  <script src="{{asset('template/vendors/jquery/dist/jquery.min.js')}}"></script>

  <script src="{{asset('template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('template/vendors/fastclick/lib/fastclick.js')}}"></script>

  <script src="{{asset('template/vendors/nprogress/nprogress.js')}}"></script>

  <script src="{{asset('template/vendors/Chart.js/dist/Chart.min.js')}}"></script>

  <script src="{{asset('template/vendors/gauge.js/dist/gauge.min.js')}}"></script>

  <script src="{{asset('template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>

  <script src="{{asset('template/vendors/iCheck/icheck.min.js')}}"></script>

  <script src="{{asset('template/vendors/skycons/skycons.js')}}"></script>

  <script src="{{asset('template/vendors/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset('template/vendors/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('template/vendors/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset('template/vendors/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('template/vendors/Flot/jquery.flot.resize.js')}}"></script>

  <script src="{{asset('template/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{asset('template/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{asset('template/vendors/flot.curvedlines/curvedLines.js')}}"></script>

  <script src="{{asset('template/vendors/DateJS/build/date.js')}}"></script>

  <script src="{{asset('template/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{asset('template/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>

  <script src="{{asset('template/vendors/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('template/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>


  <script src="{{asset('template/build/js/custom.min.js')}}"></script>


  <script src="{{asset('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  <script src="{{asset('template/vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{asset('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{asset('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

  @yield('js')
</body>

</html>