<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/admin/img/apple-icon.png')}}">
   <link rel="icon" type="image/png" href="{{asset('uploads/favicon.png')}}">
   <title>
      Welcome
   </title>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   @include('admin.inc.style')

   <style>
      .float-right {
         float: right;
      }

      .text-green {
         color: green;
      }

      .text-red {
         color: red;
      }

      .text-white {
         color: red;
      }

      .objectfit-cover {
         object-fit: cover;
      }

      .pagination {
         float: right;
      }

      .display-none {
         display: none;
      }

      .width-max {
         width: max-content;
         ;
      }

      table.dataTable.no-footer {
         border-bottom: 1px solid #e9ecef !important;
      }

      .navbar-vertical .navbar-nav>.nav-item .nav-link.active .icon {
         background-image: linear-gradient(310deg, #ff5c39 0%, #ff5c39 100%);
         color: white;
      }

      .bg-gradient-primary {
         background-image: linear-gradient(310deg, #ff5c39 0%, #ff5c39 100%);
      }

      .btn-primary {
         background-color: #ff5c39;
      }

      .btn-primary:hover,
      .btn.bg-gradient-primary:hover {
         background-color: #ff5c39;
      }

      .page-item.active .page-link {
         background-color: #ff5c39;
         border-color: #ff5c39;
      }

      div.dataTables_wrapper div.dataTables_info {
         font-size: .75rem;
      }

      .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
         color: white !important;
         border: 0px solid #ffff !important;
         box-shadow: none;
         background: white !important;
      }

      .dataTables_wrapper .dataTables_paginate .paginate_button:active {
         background: white !important;
         box-shadow: none;
      }

      .page-item:not(:first-child) .page-link {
         margin-left: -24px;
      }

      .badge-dark:hover,
      .badge-dark:focus {
         color: white !important;
      }

      .fiterDiv {
         border: 0.5px solid lightgray;
         padding: 10px;
         border-radius: 10px;
         margin-bottom: 15px;
         /* box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; */
      }

      .footer-fix {
         position: absolute;
         bottom: 0;
         width: 100%;
         left: 0;
      }

      .lodar-modal1 {
      position: fixed;
      background: rgb(0 0 0 / 70%);
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      text-align: center;
      z-index: 9999;
    }
   </style>

   @yield('style')
</head>

<body class="g-sidenav-show  bg-gray-100">


  <div class="lodar-modal1" id="preloader_front" style="display:block">
   <div class="">
     <img style="margin-top: 200px;" src="{{asset('assets/admin/img/Spinner.svg')}}" alt="" />
   </div>
 </div>

   <!-- sidebar -->
   @include('admin.inc.sidebar')

   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
               <a href="javascript:;" class="nav-link text-body p-0">
                  <div class="sidenav-toggler-inner">
                     <i class="sidenav-toggler-line"></i>
                     <i class="sidenav-toggler-line"></i>
                     <i class="sidenav-toggler-line"></i>
                  </div>
               </a>
            </div>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
               <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                  <!-- <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                        </div> -->
               </div>
               <ul class="navbar-nav  justify-content-end">
                  <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                           <i class="sidenav-toggler-line"></i>
                           <i class="sidenav-toggler-line"></i>
                           <i class="sidenav-toggler-line"></i>
                        </div>
                     </a>
                  </li>
                  <!-- <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                          <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                        </li> -->
                  <li class="nav-item dropdown pe-2 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user cursor-pointer"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="">
                           <a class="dropdown-item border-radius-md" href="javascript:;" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <div class="d-flex py-0">
                                 <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                       <i class="fa fa-sign-out"></i> <span class="font-weight-bold">Logout
                                    </h6>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                       @csrf
                                    </form>
                                 </div>
                              </div>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
         @if ($message = Session::get('success'))
         <div class="btn btn-sm w-100 btn-outline-success ">
            <strong>{{ $message }}</strong>
         </div>
         @endif
         @if ($message = Session::get('error'))
         <div class="btn btn-sm w-100 btn-outline-danger ">
            <strong>{{ $message }}</strong>
         </div>
         @endif
         @if ($message = Session::get('warning'))
         <div class="btn btn-sm w-100 btn-outline-warning ">
            <strong>{{ $message }}</strong>
         </div>
         @endif

         @yield('content')
         <footer class="footer pt-3  ">
            <div class="container-fluid">
               <div class="row align-items-center justify-content-lg-between">
                  <div class="col-lg-6 mb-lg-0 mb-4">
                     <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                           document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.jploft.com/" class="font-weight-bold" target="_blank">JPLoft</a>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                           <a class="nav-link text-muted" target="_blank"></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </footer>
      </div>
   </main>

   @include('admin.inc.script')
   @yield('script')
</body>
</html>
