  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">List of Member</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">List of Member</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="login.php" class="dropdown-toggle">
            
              
            </a>
            
          <li class="dropdown user user-menu" style="background-color: #f39c12">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><strong>New Package</strong></span>
            </a>
            <ul class="dropdown-menu new-package">
              <!-- The user image in the menu -->
              <li class="user-header"> 
               <a href="addmember-newpack.php">
                  <span>Add Member</span>
                 </a>
              </li>
              <li class="user-header"> 
                <a href="maintenance_purchase.php">
                  <span>Add Purchase</span>
              </a>
              </li>
              <li class="user-header"> 
                <a href="list-newpack.php">
                  <span>Payout List</span>
              </a>
              </li>
              <li class="user-header"> 
                <a href="listnewmember.php">
                  <span>List of Member</span>
              </a>
              </li>
              <li class="user-header"> 
                <a href="secode.php">
                  <span>Generate Code</span>
              </a>
              </li> 
              <!-- Menu Body --> 
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="login.php"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Personel</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="admin-dashboard.php"><i class="fa fa-home"></i> <span>Admin Dashboard</span></a></li>
        <li class=""><a href="addmember-newpack.php"><i class="fa fa-link"></i> <span>Add Member 2,500 Package</span></a></li>
        <li><a href="maintenance_purchase.php"><i class="fa fa-gears"></i> <span>Add Purchase(Maintenance)</span></a></li>
        <li><a href="list-newpack.php"><i class="fa fa-table"></i> <span>Payout List</span></a></li>  
        <li><a href="listnewmember.php"><i class="fa fa-gears"></i> <span>List Member</span></a></li>  
        <li><a href="secode.php"><i class="fa fa-table"></i> <span>Generate Code</span></a></li> 
         
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>