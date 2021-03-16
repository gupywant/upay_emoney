  <!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="PAYU">
  <title>PAYU</title>
  <!-- Favicon -->
  <!--link rel="icon" href="{{URL::asset('img/logo.jpeg')}}" type="image/png"-->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets_admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets_admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets_admin/css/argon.css?v=1.2.0" type="text/css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <font class="text-purple">Admin Menu</font>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
          </ul>
          @if(Session::get('user_type') === 'Admin')
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">User Data</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('userAddGet')}}">
                <i class="fas fa-user-plus text-blue"></i>
                <span class="nav-link-text">Add User</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('userList', 1)}}">
                <i class="fa fa-user text-blue"></i>
                <span class="nav-link-text">Admin</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('userList', 2)}}">
                <i class="fas fa-store text-blue"></i>
                <span class="nav-link-text">Kantin</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('userList', 3)}}">
                <i class="fa fa-users text-blue"></i>
                <span class="nav-link-text">Siswa</span>
              </a>
            </li>
          </ul>
          @endif
          @if(Session::get('user_type') === 'Admin' or Session::get('user_type') === 'Penjual')
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Operation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('readCardGet')}}">
                <i class="fa fa-id-card text-blue"></i>
                <span class="nav-link-text">Read Tag ID</span>
              </a>
            </li>
          </ul>
          @if(Session::get('user_type') === 'Penjual')     
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('transactionGet')}}">
                <i class="fa fa-shopping-cart text-blue"></i>
                <span class="nav-link-text">New Transaction</span>
              </a>
            </li>
          </ul>
          @endif
          @if(Session::get('user_type') === 'Admin')
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('topupGet')}}">
                <i class="fa fa-plus text-blue"></i>
                <span class="nav-link-text">Top Up</span>
              </a>
            </li>
          </ul>
          @endif
          @endif
          @if(Session::get('user_type') === 'Siswa' or Session::get('user_type') === 'Penjual')
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Report</span>
          </h6>
          @if(Session::get('user_type') === 'Penjual')
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('salesList')}}">
                <i class="fas fa-chart-line text-blue"></i>
                <span class="nav-link-text">Sales Report</span>
              </a>
            </li>
          </ul>
          @endif
          @if(Session::get('user_type') === 'Siswa')      
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('transactionList')}}">
                <i class="fas fa-chart-line text-blue"></i>
                <span class="nav-link-text">Transaction Report</span>
              </a>
            </li>
          </ul>
          @endif
          @endif
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Account</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#pwModal">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Change Password</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
    <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!--form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form-->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <i class="fa fa-user"></i>
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{Session::get('username')}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      <!-- Modal -->
<div class="modal fade" id="pwModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('changePassword')}}" method="post">
          {{csrf_field()}}
          <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Old Password</label>
                    <input type="password" name="oldpw" id="input-username" class="form-control" placeholder="Password Lama">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">new Password</label>
                    <input type="password" name="pw" id="input-username" class="form-control" placeholder="Password Baru">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Password Confirmation</label>
                    <input type="password" name="pw2" id="input-username" class="form-control" placeholder="Tulis Ulang Password Baru">
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end of modal -->
    <!-- Header -->
    <!-- Header -->