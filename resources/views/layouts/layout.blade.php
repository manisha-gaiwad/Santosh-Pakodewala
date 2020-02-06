<!DOCTYPE html>
<html>
<head>

  <title>@yield('title') | {{ config('app.name') }} </title>
  @include('pages.style')
  @yield('customcss')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('pages.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('pages.sidebar')
 <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-<?php date("Y"); ?> <a href="http://hastensolutions.in/">Hasten Solutions</a>.</strong>
    All rights reserved.
    
  </footer>

  
</div>
<!-- ./wrapper -->
 @include('pages.script')
 @yield('customscripts')
</body>
</html>
