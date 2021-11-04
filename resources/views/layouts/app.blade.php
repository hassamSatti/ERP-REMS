<!DOCTYPE html>
<html lang="ERP">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ERP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>
<style>
.select2-container
{
  width:100% !important;
}
.table td
{padding: .40rem !important;}
.nav-sidebar .menu-open > .nav-treeview {margin-left: 5% !important;}
.btn-xs 
{
    padding: 0.0rem .35rem !important;
}
.table td 
{
  padding: .15rem !important;
}
</style>
<body class="sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links 
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search 
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      -->
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bx bx-power-off"></i><span>Logout</span>
        </a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="ERP" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ERP</span>
    </a>
    {{-- {{ $img = asset('user/images/'.Auth::user()->name) }} --}}
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/user/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
            <li class="nav-item {{ (Request::is('home/*') || Request::is('home') ? ' menu-is-opening menu-open' : '') }}">
              <a href="{{ route('home') }}" class="nav-link  {{ (Request::is('home/*') || Request::is('home') ? 'active' : '') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            @can('Member List')
               <li class="nav-item {{ (Request::is('member/*') || Request::is('member') ? ' menu-is-opening menu-open' : '') }}">
                   <a href="{{ route('member.index') }}" class="nav-link  {{ (Request::is('member/*') || Request::is('member')? 'active' : '') }}">
                   
                   <i class="nav-icon fa fa-user-circle"></i>
                   <p>
                       Member
                   </p>
                   </a>
               </li>
            @endcan 
            
            @canany(['Inventory Create','Inventory List','Inventory Edit','Inventory Delete']) 
            <li class="nav-item  {{ (Request::is('project/*') || Request::is('project') || Request::is('sector/*') || 
            Request::is('sector') || Request::is('street/*') || Request::is('street') || Request::is('size/*') 
            || Request::is('size') || Request::is('unit/*')
             || Request::is('unit') || Request::is('plan/*') || Request::is('plan') ? ' menu-is-opening menu-open' : '') }}">
                <a href="#" class="nav-link  {{ (Request::is('project/*') || Request::is('project') || 
                Request::is('sector/*') || Request::is('sector') || Request::is('street/*') || Request::is('street') 
                || Request::is('size/*') || Request::is('size') || Request::is('unit/*') || Request::is('unit') 
                || Request::is('plan/*') || Request::is('plan')  ? 'active' : '') }}">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                    Inventory
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('project.index') }}" class="nav-link  {{ (Request::is('project/*') 
                        || Request::is('project') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Projects</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('sector.index') }}" class="nav-link  {{ (Request::is('sector/*') 
                        || Request::is('sector') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Sectors/Blocks</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('street.index') }}" class="nav-link  {{ (Request::is('street/*') 
                        || Request::is('street') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Streets/Floors</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('size.index') }}" class="nav-link  {{ (Request::is('size/*') 
                        || Request::is('size') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Sizes</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('unit.index') }}" class="nav-link  {{ (Request::is('unit/*') 
                        || Request::is('unit') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Units</p>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                      <a href="{{ route('plan.index') }}" class="nav-link  {{ (Request::is('plan/*') 
                      || Request::is('plan') ? 'active' : '') }}">
                      <i class="fa fa-arrow-right"></i>
                      <p>Installment Plan</p>
                      </a>
                  </li> 
                </ul>
            </li>
            @endcanany   

            @can('Allotment List')
               <li class="nav-item {{ (Request::is('allotment/*') || Request::is('allotment') ? ' menu-is-opening menu-open' : '') }}">
                   <a href="{{ route('allotment.index') }}" class="nav-link  {{ (Request::is('allotment/*') || Request::is('allotment')? 'active' : '') }}">
                   
                   <i class="nav-icon fas fa-file-export"></i>
                   <p>
                       Memberships/Allotments
                   </p>
                   </a>
               </li>
            @endcan 
            
            
            @canany(['Accounts Create','Accounts List','Accounts Edit','Accounts Delete']) 
            <li class="nav-item  {{ (Request::is('accountgrandparent/*') || Request::is('accountgrandparent') || 
            Request::is('accountparent/*') || Request::is('accountparent') || 
            Request::is('account/*') || Request::is('account') ? ' menu-is-opening menu-open' : '') }}">
                <a href="#" class="nav-link  {{ (Request::is('accountgrandparent/*') || Request::is('accountgrandparent') || 
                Request::is('accountparent/*') || Request::is('accountparent') ||
                Request::is('account/*') || Request::is('account')  ? 'active' : '') }}">
                <i class="nav-icon fas fa-wallet"></i>
                <p>
                    Accounts
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('accountgrandparent.index') }}" class="nav-link  {{ (Request::is('accountgrandparent/*') 
                        || Request::is('accountgrandparent') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Accounts Grand Parent</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('accountparent.index') }}" class="nav-link  {{ (Request::is('accountparent/*') 
                      || Request::is('accountparent') ? 'active' : '') }}">
                      <i class="fa fa-arrow-right"></i>
                      <p>Accounts Parent</p>
                      </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{ route('account.index') }}" class="nav-link  {{ (Request::is('account/*') 
                    || Request::is('account') ? 'active' : '') }}">
                    <i class="fa fa-arrow-right"></i>
                    <p>COA</p>
                    </a>
                </li> 
                </ul>
            </li>
            @endcanany 


            @can('User List')
            <li class="nav-item {{ (Request::is('users/*') || Request::is('users') ? ' menu-is-opening menu-open' : '') }}">
                <a href="{{ route('users.index') }}" class="nav-link  {{ (Request::is('users/*') || Request::is('users')? 'active' : '') }}">
                
                <i class="nav-icon fa fa-users"></i>
                <p>
                    User
                </p>
                </a>
            </li>
            @endcan 
               
            @canany(['Role List','Permission List'])      
            <li class="nav-item  {{ (Request::is('roles/*') || Request::is('roles') || Request::is('permissions') 
            || Request::is('permissions/*') ? ' menu-is-opening menu-open' : '') }}">
                <a href="#" class="nav-link  {{ (Request::is('roles/*') || Request::is('roles') || Request::is('permissions') || Request::is('permissions/*') ? 'active' : '') }}">
               <i class="nav-icon fa fa-hand-sparkles"></i>
                <p>
                    Roles
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('Role List')  
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link  {{ (Request::is('roles/*') || Request::is('roles') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Roles</p>
                        </a>
                    </li>
                    @endcan
                    @can('Permission List') 
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link  {{ (Request::is('permissions/*') || Request::is('permissions') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Permission</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @canany(['Setting'])      
            <li class="nav-item  {{ (Request::is('designation/*') || Request::is('designation') || Request::is('department') || 
            Request::is('department/*') || Request::is('country/*') || Request::is('country') || Request::is('city/*') || 
            Request::is('city') ? ' menu-is-opening menu-open' : '') }}">
                <a href="#" class="nav-link  {{ (Request::is('designation/*') || Request::is('designation') 
                || Request::is('department') || Request::is('department/*') || Request::is('country/*')
                || Request::is('country') || Request::is('city/*') || Request::is('city') ? 'active' : '') }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Setting
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('designation.index') }}" 
                        class="nav-link  {{ (Request::is('designation/*') || Request::is('designation') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Designation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('department.index') }}" 
                        class="nav-link  {{ (Request::is('department/*') || Request::is('department') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Department</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('country.index') }}"
                         class="nav-link  {{ (Request::is('country/*') || Request::is('country') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>Country</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('city.index') }}" 
                        class="nav-link  {{ (Request::is('city/*') || Request::is('city') ? 'active' : '') }}">
                        <i class="fa fa-arrow-right"></i>
                        <p>City</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcanany

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">erp.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script> 
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script> 
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<script>
  $(function () 
  {
    $('.select2').select2();
    $('#data_table').DataTable({
      "pageLength": 25,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  });
</script>  
</body>
</html>

