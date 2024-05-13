
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> @yield("titre") </title>
  
   <link rel="stylesheet" />

    @livewireStyles
   @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    <x-topnav />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-bold" style="font-size: 1.3em;"><b>SESAME</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="image">
        
              <img src="{{ Vite::asset('resources/images/user.png') }} " alt="User profile picture">
      
        </div>
        
        <div class="info">
          <a href="#" class="d-block text-warning">{{userFullName()}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <x-menu />
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield("contenu")
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <x-sidebar/>
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="https://www.tgr-ci.com">tgr-ci.com</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@livewireScripts
</body>
</html>
