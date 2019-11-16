<?php
include ('dbconnection.php');

    session_start();
    $id = $_SESSION['pdid'];
    if(!isset($_SESSION['pdid']) || (trim($_SESSION['pdid']) == '')) {
       header("location: login.php");
      exit();
    }

    if (isset($_POST['submits'])) {
                $srp = $_POST['srp'];
                $pids = $_POST['pids'];
                $mid = $_POST['mid'];
                 $qty = $_POST['qty'];






    $x = 1; 
    $gs = 0;  
    $hid= $mid;

    $hdat = gmdate("Y-m-d");
    $time=strtotime($hdat);
    $month=date("m",$time);
    $year=date("Y",$time);

    
    $sql = "INSERT INTO purchase (pid,id,price,dat,qty)
    VALUES ('$pids','$mid','$srp','$hdat','$qty')";
    if ($conn->query($sql) === TRUE) {                         

    }







        while($x <= 9) {
            $query = "SELECT * FROM member where uid='$hid'";
            $result = mysqli_query ($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                    $hid=$row['sid'];
            }

                if($hid=='2'){
                              $x=9;
                              }else{
                                    if($x==1){
                                        $gs = ($srp * 0.03) * $qty;

                                        $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['one'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET one='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('$gs','0','0','0','0','0','0','0','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }

                                    } 
                                    if($x==2){
                                        $gs = ($srp * 0.03)* $qty;

                                        $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['two'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET two='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('0','$gs','0','0','0','0','0','0','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }

                                    }
                                    if($x==3){
                                        $gs = ($srp * 0.04)* $qty;



                                        $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['three'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET three='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('0','0','$gs','0','0','0','0','0','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }

                                    } 
                                    if($x==4){
                                        $gs = ($srp * 0.02)* $qty;


                                         $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['four'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET four='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('0','0','0','$gs','0','0','0','0','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }


                                    } 
                                    if($x==5){
                                        $gs = ($srp * 0.01)* $qty;


                                         $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['five'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET five='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('0','0','0','0','$gs','0','0','0','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }


                                    } 
                                    if($x==6){
                                        $gs = ($srp * 0.01)* $qty;



                                        $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['six'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET six='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('0','0','0','0','0','$gs','0','0','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }



                                    } 
                                    if($x==7){
                                        $gs = ($srp * 0.01) * $qty;


                                         $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['seven'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET seven='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('0','0','0','0','0','0','$gs','0','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }


                                    } 
                                    if($x==8){
                                        $gs = ($srp * 0.01) * $qty;


                                         $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['eight'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET eight='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                          VALUES ('0','0','0','0','0','0','0','$gs','0','$hid','$hdat')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }


                                    } 
                                    // if($x==9){
                                    //     $gs = ($srp * 0.01) * $qty;

                                    //     $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                    //     $result2 = mysqli_query ($conn, $query2);
                      
                                    //       if($result2->num_rows !=0){   
                                    //       while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                    //         $sumra = $row2['nine'] + $gs;
                                    //         $results = $conn->query("UPDATE rebates SET nine='$sumra' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'"); 
                                          
                                    //       }        
                                    //       }else{
                                    //       $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat)
                                    //       VALUES ('0','0','0','0','0','0','0','0','$gs','$hid','$hdat')";
                                    //       if ($conn->query($sql) === TRUE) {                         

                                    //       }

                                    //     }


                                    // } 

                                    

                                                                     



                              }


               $x++;                    
           }

    }    



   
 

          
?>


<!DOCTYPE html>

<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>

  <script>
  $(function() {
    $( "#pn" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
              
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
        <li class="active"><a href="admin-dashboard.php"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li><a href="purchase.php"><i class="fa fa-link"></i> <span>Purchase</span></a></li>
        <li><a href="prodreg.php"><i class="fa fa-link"></i> <span>Product Registration</span></a></li>

        <li><a href="secode.php"><i class="fa fa-link"></i> <span>Codes</span></a></li>
        <li><a href="request.php"><i class="fa fa-link"></i> <span>Request payouts</span></a></li>
        <li><a href="done.php"><i class="fa fa-link"></i> <span>Done payouts</span></a></li>
        
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
        PURCHASE PRODUCT
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
  <div class="box">
            <div class="box-header">
            <div class="box-body">



         


            <div class="register-box">
  

  <div class="register-box-body">
    <p class="login-box-msg">Purchase</p>
     
    <form method="post">
      <div class="form-group has-feedback">
         <input type="text"required="" value="" name="uname" id="uname" class="form-control"placeholder="username">
          <input type="hidden"required="" value="" name="mid" id="mid" class="form-control">
       
      </div> 
      <div class="form-group has-feedback">
         <input type="text"required="" value="" name="fn" id="fn"placeholder="Customer's name" class="form-control"readonly>
       
      </div> 
      <div class="form-group has-feedback">
         <input type="text" placeholder="Productname" required="" value="" name="pn" id="pn" class="form-control">
        <input type="hidden"required="" value="" name="pids" id="pids" class="form-control">
      </div>  
      <div class="form-group has-feedback">
        <input type="text"required="" value="" name="qty" id="qty" class="form-control"placeholder="Quantity">
      
      </div>
      <div class="form-group has-feedback">
        <input type="text" placeholder="SRP" required="" value="" name="srp" id="srp" class="form-control"readonly>
        
      </div>
      <div class="form-group has-feedback">
        <input type="text" placeholder="Amount" required="" value="" name="rb" id="rb" class="form-control"readonly>
        
      </div>
      



      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"name="submits" class="btn btn-primary btn-block btn-flat">Purchase</button>
        </div>
        <!--
         /.col -->
         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
                             

    </form>

    
  <!-- /.form-box -->
</div>        

</div>
</div>
</div>
      </div>

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>



jQuery(document).ready(function($){ 
     $('#pn').blur(function(){
     var id=$("#pn").val();
     var qt=$("#qty").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "prod.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 

                         $("#srp").val(html); 
                         var tot = (res * 0.1)*qt;
                         $("#rb").val(tot);    
                    }
                });      
         });
     });



jQuery(document).ready(function($){ 
     $('#qty').blur(function(){
     var id=$("#pn").val();
     var qt=$("#qty").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "prod.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 



                         $("#srp").val(html); 
                         var tot = res * qt;
                         $("#rb").val(tot);    
                    }
                });      
         });
     });


jQuery(document).ready(function($){ 

     $('#pn').blur(function(){
     var id=$("#pn").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "prodid.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 

                         $("#pids").val(html); 
                          
                    }
                });      
         });
     });    









jQuery(document).ready(function($){ 
     $('#uname').blur(function(){
     var id=$("#uname").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "pname.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 

                         $("#fn").val(html); 
                          
                    }
                });      
         });
     });


jQuery(document).ready(function($){ 
     $('#uname').blur(function(){

     var id=$("#uname").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "memid.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 

                         $("#mid").val(html); 
                          
                    }
                });      
         });
     });





jQuery(document).ready(function($){ 
     $('#ref_id').blur(function(){
          

         var id=$("#ref_id").val();
     
                 $.ajax({
                    type: "POST",
                    async: "false",
                    url: "ref.php",
                    data: { text1: id },
                    success: function(html) {                                       
                    var res = html; 

                         $("#sname").val(html); 
                           
                    }
                });   


         });
     });

















  $.widget.bridge('uibutton', $.ui.button);
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

</body>

</html>
