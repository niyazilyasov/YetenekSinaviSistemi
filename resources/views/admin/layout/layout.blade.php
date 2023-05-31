<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.0
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>MEU Yetenek Sınav Sistemi</title>
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
      <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
      <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{asset('vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendors/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/DataTables/datatables.css')}}">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link href="{{asset('css/examples.css')}}" rel="stylesheet">
      <link href="{{asset('vendors/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
      <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      @yield('head')
  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed sidebar-narrow-unfoldable" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <img class="sidebar-brand-full" width="118" height="70" alt="MEU Logo" src="{{asset('assets/brand/30yilmeulogo.png')}}">
        <img class="sidebar-brand-narrow" width="50" height="50" alt="MEU Logo" src="{{asset('assets/brand/30yilmeulogo.png')}}">
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{url('admin/home')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg')}}#cil-speedometer"></use>
            </svg> Kontrol Paneli</a></li>
          <li class="nav-title">Ayarlar</li>
          @if(Auth::user()->is_super_admin)
          <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                  <svg class="nav-icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg')}}#cil-user"></use>
                  </svg> Kullanıcılar</a>
              <ul class="nav-group-items">
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/user')}}"><span class="nav-icon"></span> Kullanıcılar listesi</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/user/create')}}"><span class="nav-icon"></span> Kullanıcı ekle</a></li>
              </ul>
          </li>
          <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                  <svg class="nav-icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg')}}#cil-paperclip"></use>
                  </svg> Duyurular</a>
              <ul class="nav-group-items">
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/duyuru')}}"><span class="nav-icon"></span> Duyuru listesi</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/duyuru/create')}}"><span class="nav-icon"></span> Duyuru ekle</a></li>
              </ul>
          </li>
          @endif
          <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                  <svg class="nav-icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg')}}#cil-pen"></use>
                  </svg> Başvurular</a>
              <ul class="nav-group-items">
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/guzelSanatlarBasvuru')}}"><span class="nav-icon"></span> Güzel Sanatlar</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/BesyoBasvuru')}}"><span class="nav-icon"></span>Besyo başvuru</a></li>

              </ul>
          </li>
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg')}}#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <img width="118" height="46" alt="MEU Logo" src="{{asset('assets/brand/30yilmeulogo.png')}}">
            </a>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="{{url('admin/home')}}">Kontrol Paneli</a></li>
            @if(Auth::user()->is_super_admin)
            <li class="nav-item"><a class="nav-link" href="{{url('admin/user')}}">Kullanıcılar</a></li>
            @endif

          </ul>
          <ul class="header-nav ms-auto">
          </ul>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="{{asset('storage/thumbnail/'.auth()->user()->image_url)}}" alt="{{auth()->user()->name}}"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="{{ route('admin_user_edit_profile') }}">
                  <svg class="icon me-2">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg')}}#cil-user"></use>
                  </svg> Profil</a>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <svg class="icon me-2">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg')}}#cil-account-logout"></use>
                  </svg> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
                {{ Breadcrumbs::render() }}
          </nav>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div><a href="https://mersin.edu.tr">Mersin Üniversitesi</a> © 2022 BİDB.</div>
        <div class="ms-auto">bize ulaşın&nbsp;<a hr1ef="mailto:bidb@mersin.edu.tr">bidb@mersin.edu.tr</a></div>
      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{asset('vendors/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('vendors/DataTables/datatables.js')}}"></script>
    <script src="{{asset('vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @stack('scripts')
    <script>
    </script>

  </body>
</html>
