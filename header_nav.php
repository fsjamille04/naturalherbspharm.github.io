<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard | Natural Herbs</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <style type="text/css">
      .new-package li {
          height: auto !important;
      }
      
      .new-package li a {
          color: white !important;
      }
      
      .new-package li:hover {
          background-color: white !important;
      }
      
      .new-package li a:hover {
          color: black;
          background-color: #3c8dbc !important;
      } 


    @media print {
        body * {
            visibility: hidden;
        }
        #PrintModal,
        #PrintModal * {
            visibility: visible;
            /* margin-top:-1px;*/
        }
        #PrintModal {
            position: absolute;
            left: 0;
            top: 0;
        }
        #PrintModal table {
            padding-left: 20px !important;
        }
        #PrintModal table.payout_table,
        table.payout_table td,
        table.payout_table th {
            padding-right: 15px !important;
            padding-bottom: : 0 !important;
            font-size: 10px;
        }
        #PrintModal table#unilvl_bonus2,
        table#unilvl_bonus2 td,
        table#unilvl_bonus2 th {
            padding-right: 28px !important;
            padding-bottom: : 0 !important;
            font-size: 10px;
        }
        #PrintModal input.fix_input {
            margin-left: 60px !important;
        }
    }
    
    #loading-indicator {
        position: absolute;
        left: 50px;
        top: 50px;
    }
    
    table.payout_table,
    table.payout_table td,
    table.payout_table th {
        padding-right: 75px;
        padding-left: 5px;
        padding-bottom: 5px;
    }
    
    table.unilvl_bonus2,
    table.unilvl_bonus2 td,
    table.unilvl_bonus2 th {
        padding-right: 85px;
        padding-left: 5px;
        padding-bottom: 5px;
    }
    .new-package li{
      height: auto !important;
    } 
    .new-package li a{
      color: white !important;
    }
    .new-package li:hover {
      background-color: white !important;
    }
    .new-package li a:hover{
      color: black;
      background-color: #3c8dbc !important;
    } 
</style>

<script type="text/javascript">
  
jQuery(document).ready(function($) { 
  
    var path = window.location.pathname.split("/").pop() ;     
  
    if( path == '' ){
      path = 'admin-dashboard.php';
    }
    var target = $('nav a[href="'+path+'"]');
    target.addClass('active')
}); 
</script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


<header class="main-header">
    <a href="index.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">Dashboard</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Dashboard</span>
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

                    <!-- User Account Menu -->
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
                                    <span>List Member</span>
                                </a>
                            </li>
                            <!--  <li class="user-header"> 
                <a href="payout-newpack.php">
                  <span>Payout</span>
              </a>
              </li> -->
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
    <section class="sidebar sidemenu">

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
            <li value="admin-dashboard" ><a href="admin-dashboard.php"><i class="fa fa-home"></i> <span>Admin Dashboard</span></a></li>
            <li value="admin-payout"><a href="admin-payout.php"><i class="fa fa-link"></i> <span>Admin Payout</span></a></li>
            <li value="admin-register"><a href="admin-register.php"><i class="fa fa-link"></i> <span>Admin Register</span></a></li>
            <li value="purchase-history"><a href="purchase-history.php"><i class="fa fa-link"></i> <span>Purchase History</span></a></li>
            <li value="purchase"><a href="purchase.php"><i class="fa fa-link"></i> <span>Re-Purchase</span></a></li>
            <li value="prodreg"><a href="prodreg.php"><i class="fa fa-table"></i> <span>Product Registration</span></a></li>

            <li value="secode"><a href="secode.php"><i class="fa fa-gears"></i> <span>Generate Codes</span></a></li>
            <li value="request"><a href="request.php"><i class="fa fa-money"></i> <span>Payable Withdrawal</span></a></li>
            <li value="done"><a href="done.php"><i class="fa fa-money"></i> <span>Paid Withdrawal</span></a></li>
            <li class="member"><a href="member.php"><i class="fa fa-link"></i> <span>List of Members</span></a></li>
            <li value="login1"><a href="login1.php"><i class="fa fa-mail-reply"></i> <span>Logout</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>