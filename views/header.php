

  <header class="main-header">
    <!-- Logo -->
    <a href="general.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T&L</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>T&L</b> System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/avatar5.png" class="user-image" alt="User Image">
              <span id="sessionOrigin" class="hidden-xs"><?php echo $name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo $name; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../presenters/destroysession.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>






      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li ng-if="isLogistic">
            <a ui-sref-active="active" ui-sref="users"  style="cursor:pointer;"><i class="fa fa-user fa-fw"></i> <span> User Administration</span></a>
        </li>
        <li ng-if="isEncargado || isVigilant || isLogistic">
            <a ui-sref-active="active" ui-sref="transport" style="cursor:pointer;"><i class="fa fa-truck fa-fw"></i><span> Transport</span></a>
        </li>
        <li ng-if="isEncargado || isLogistic">
            <a ui-sref-active="active" ui-sref="reports" style="cursor:pointer;"><i class="fa fa-bar-chart fa-fw"></i><span> Reports</span></a>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->






  <!-- /.content-wrapper -->
