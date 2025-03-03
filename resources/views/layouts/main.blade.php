<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Inventaris Sederhana</title>

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Jika menggunakan file lokal -->
   <link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
   <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('templates/dist/css/adminlte.min.css') }}">

  <style>
    /* Navbar Styling */
    .main-header {
      background-color: #1ABC9C !important;
    }

    /* Sidebar Styling */
    .main-sidebar {
      background-color: #34495E !important;
    }

    .nav-sidebar .nav-item a {
      color: white !important;
      transition: 0.3s;
    }

    .nav-sidebar .nav-item a:hover {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 5px;
    }

    /* Content Wrapper */
    .content-wrapper {
      background-color: #ECF0F1;
      padding: 20px;
    }

    /* Card Styling */
    .card {
      border-radius: 10px;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Tombol Back to Top */
    .back-to-top {
      background-color: #1ABC9C;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      bottom: 20px;
      right: 20px;
      transition: 0.3s;
    }

    .back-to-top:hover {
      background-color: #16A085;
    }

    /* Smooth Scrolling */
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.components.navbar')

  <!-- Sidebar -->
  @include('layouts.components.sidebar')

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
      <div class="container-fluid">
        @yield('header')
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>

    <!-- Back to Top Button -->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2024 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Scripts -->
 <script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('templates/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
