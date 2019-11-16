<?php
include ('dbconnection.php');

    session_start();
    $id = $_SESSION['pdid'];
    if(!isset($_SESSION['pdid']) || (trim($_SESSION['pdid']) == '')) {
       header("location: login.php");
      exit();
    }

  
     $sql = "SELECT * FROM member WHERE uid = '$id'";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
    $content = $row['picture'];
    $fn = $row['fn'];
    $ln = $row['ln'];
    $mn = $row['mn'];
    $ad = $row['ad'];
    $phoner = $row['phone'];
    
    $uname= $row['uname'];
    
    $pass = $row['upass'];
         if($content!=NULL){
           $pic ='data:image/jpg;base64,'. base64_encode( $row['picture'] ) .'';
         }
         else {
           $pic ="images/profile.jpg";
         }
   } 




          
?>






<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Profile | Natural Herbs</title>
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
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
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
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Natures ID</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Natural Herbs - Member
                  <small>Active Member</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="dashboard.php" class="btn btn-default btn-flat">Dashboard</a>
                </div>
                <div class="pull-right">
                  <a href="login.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
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
          <p><?php echo $uname;?></p>
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
        <li><a href="dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="active"><a href="updatenew.php"><i class="fa fa-gears"></i> <span>Edit Account</span></a></li>
        <li><a href="direct.php"><i class="fa fa-link"></i> <span>Direct Recruit</span></a></li>
        <li><a href="indirect.php"><i class="fa fa-group"></i> <span>Unilevel tree</span></a></li>
        <li><a href="register.php"><i class="fa fa-table"></i> <span>Register</span></a></li>
        <li><a href="login.php"><i class="fa fa-mail-reply"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Account
        
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="admin-dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="login.php">Logout</a></li>
      </ol>
    </section>

    <div id="wrapper">

<div class="content">





    <div class="col-lg-8">
        <div class="content">
            <div class="hpanel">

    
              
                <div class=""><h3>Edit Profile</h3>
          
           
                <div>
                 
                    <div class="panel-body no-padding">
                        <div class="panel-body">
                            <form method="POST">

                                            <div class="form-group col-lg-8">
                                            <label>Old Username</label>
                                            <input type="text" value="<?php echo $uname;  ?>" id="" class="form-control" name="" required="">
                                            </div>

                                            <div class="form-group col-lg-8">
                                            <label>Old Password</label>
                                            <input type="text" value="<?php echo $pass;  ?>" id="" class="form-control" name="" required="">
                                            </div>

                                            <div class="form-group col-lg-8">
                                            <label>New Username</label>
                                            <input type="text" value="" id="uname" class="form-control" name="uname" required="">
                                            </div>


                                            <div class="form-group col-lg-8">
                                            <label>New Password</label>
                                            <input type="text" value="" id="pass" class="form-control" name="pass" required="">
                                            </div>

                                            <div class="form-group col-lg-8">
                                            <label>Set New Pick-up Place</label>
                                            <input type="text" value="" id="ad" class="form-control" name="ad" required="">
                                            </div>

                                             <div class="form-group col-lg-8">
                                            <button class="btn btn-success col-lg-12" name="register3" id="register3">Save</button>

                                            </div>
                                        
                                           <?php
  if(isset($_POST['register3'])) {
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $ad = $_POST['ad'];
  
  

    $res = $conn->query("SELECT uname FROM member WHERE uname = '$uname'");

    $num=$res->num_rows;
                            

    if($num > 0){

    echo "<script> alert('Username Already Exist!'); </script>";
    
    } 
    else{  
    $sql = "UPDATE member SET uname = '$uname', upass = '$pass', ad = '$ad' WHERE uid='$id'";
    $conn->query($sql);

    echo "<script> window.location.href = 'updatenew.php'; </script>";
    }

  } 

?>
                                        </form>
                            </DIV>
                    </div>
                </div>
            </div>


            </div>
        </div>
    </div>
</div>

</div>


</div>


 <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Designed by <a href="https://www.facebook.com/jamille.tinaco"> Jamille Tinaco</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">NaturalHerbsPharm Corp</a>.</strong> All rights reserved.
  </footer>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script>
  $(function () {


         $('#example1').dataTable( {

            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });


   
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

</body>

</html>