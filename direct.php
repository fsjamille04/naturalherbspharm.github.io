<?php
include ('dbconnection.php');

    session_start();
  $id = $_SESSION['pdid'];
   if(!isset($_SESSION['pdid']) || (trim($_SESSION['pdid']) == '')) {
       header("location: login.php");
      exit();
   }



   $idr=0;

    $nameArray = array();
                        $nameArray2 = array();
                        $nameArray3 = array();
                        $nameArray4 = array();
                        $nameArray5 = array();
                        $nameArray6 = array();
                        $nameArray7 = array();
                        $nameArray8 = array();
                         $nameArray9 = array();
                         $nameArray10 = array();


                        $namefn = array();
                        $namefn2 = array();
                        $namefn3 = array();
                        $namefn4 = array();
                        $namefn5 = array();
                        $namefn6 = array();
                        $namefn7 = array();
                        $namefn8 = array();
                        $namefn9 = array();
                        $namefn10 = array();



                        $sp2 = array();
                        $sp3 = array();
                        $sp4 = array();
                        $sp5 = array();
                        $sp6 = array();
                        $sp7 = array();
                        $sp8 = array();
                        $sp9 = array();
                        $sp10 = array();


                        $tp2 = array();
                        $tp3 = array();
                        $tp4 = array();
                        $tp5 = array();
                        $tp6 = array();
                        $tp7 = array();
                        $tp8 = array();
                        $tp9 = array();
                        $tp10 = array();


                        $sumpurchase2 = 0;
                        $sumpurchase3 = 0;
                        $sumpurchase4 = 0;
                        $sumpurchase5 = 0;
                        $sumpurchase6 = 0;
                        $sumpurchase7 = 0;
                        $sumpurchase8 = 0;
                        $sumpurchase9 = 0;
                        $sumpurchase10 = 0;

    $sql = "SELECT * FROM member WHERE uid = '$id'";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()) {
  

    $uname= $row['uname'];
      
    $fulln= $row['fn'].' '.$row['mn'].' '.$row['fn']; 
     


   }



                       $sql="SELECT * FROM member where sid='$id'";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)) {
                        
                        
                        $nameArray[] = $row['uid']; 
                        $namefn[] = $row['fn'].' '. $row['mn'].' '.$row['ln'];  
                        $hid1=$row['uid'];
                        $name = $row['fn'].' '. $row['mn'].' '.$row['ln'];
                        
                        
                            $sql2="SELECT * FROM member where sid= '$hid1'";
                            $result2 = mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_array($result2)) {
                            $sp2[] = $fulln;  
                            $idr++;
                            $nameArray2[] = $row2['uid']; 
                            $namefn2[] = $row2['fn'].' '. $row2['mn'].' '.$row2['ln']; 
                            $hid2=$row2['uid'];
                            $name2 = $row2['fn'].' '. $row2['mn'].' '.$row2['ln'];

                            $rp2 = "SELECT sum(amt) as stp FROM purchase where id='$hid2'";
                            $rresult2 = mysqli_query ($conn, $rp2); 
                            $rrow2 = mysqli_fetch_assoc($rresult2);
                            $tstp2=$rrow2['stp'];
                            if($tstp2==""){
                              $tstp2=0;
                            }
                            $sumpurchase2 += $tstp2;
                            $tp2[]=$tstp2;

                                $sql3="SELECT * FROM member where sid= '$hid2'";
                                $result3 = mysqli_query($conn,$sql3);
                                while($row3 = mysqli_fetch_array($result3)) {
                                $sp3[] = $name2;
                                 $idr++;
                                 $namefn3[] = $row3['fn'].' '. $row3['mn'].' '.$row3['ln'];                          
                                $nameArray3[] = $row3['uid']; 
                                $hid3=$row3['uid'];
                                $name3 = $row3['fn'].' '. $row3['mn'].' '.$row3['ln'];
                                
                                $rp3 = "SELECT sum(amt) as stp FROM purchase where id='$hid3'";
                                $rresult3 = mysqli_query ($conn, $rp3); 
                                $rrow3 = mysqli_fetch_assoc($rresult3);
                                $tstp3=$rrow3['stp'];
                                if($tstp3==""){
                                $tstp3=0;
                                }
                                $sumpurchase3 += $tstp3;
                                $tp3[]=$tstp3;                                    

                                    $sql4="SELECT * FROM member where sid= '$hid3'";
                                    $result4 = mysqli_query($conn,$sql4);
                                    
                                    while($row4 = mysqli_fetch_array($result4)) {
                                     $sp4[] = $name3;
                                    $hid4=$row4['uid'];
                                    $idr++;
                                    $namefn4[] = $row4['fn'].' '. $row4['mn'].' '.$row4['ln']; 
                                    $nameArray4[] = $row4['uid'];
                                    $name4 = $row4['fn'].' '. $row4['mn'].' '.$row4['ln']; 
                                    
                                    $rp4 = "SELECT sum(amt) as stp FROM purchase where id='$hid4'";
                                    $rresult4 = mysqli_query ($conn, $rp4); 
                                    $rrow4 = mysqli_fetch_assoc($rresult4);
                                    $tstp4=$rrow4['stp'];
                                    if($tstp4==""){
                                    $tstp4=0;
                                    }
                                    $sumpurchase4 += $tstp4;
                                    $tp4[]=$tstp4;                                        

                                        $sql5="SELECT * FROM member where sid= '$hid4'";
                                        $result5 = mysqli_query($conn,$sql5);
                                        while($row5 = mysqli_fetch_array($result5)) {
                                        $sp5[] = $name4;
                                        $hid5=$row5['uid'];
                                        $idr++;
                                        $namefn5[] = $row5['fn'].' '. $row5['mn'].' '.$row5['ln']; 
                                        $nameArray5[] = $row5['uid'];       
                                        $name5 = $row5['fn'].' '. $row5['mn'].' '.$row5['ln'];    

                                        $rp5 = "SELECT sum(amt) as stp FROM purchase where id='$hid5'";
                                        $rresult5 = mysqli_query ($conn, $rp5); 
                                        $rrow5 = mysqli_fetch_assoc($rresult5);
                                        $tstp5=$rrow5['stp'];
                                        if($tstp5==""){
                                        $tstp5=0;
                                        }
                                        $sumpurchase5 += $tstp5;
                                        $tp5[]=$tstp5;

                                            $sql6="SELECT * FROM member where sid= '$hid5'";
                                            $result6 = mysqli_query($conn,$sql6);
                                            while($row6 = mysqli_fetch_array($result6)) {
                                             $sp6[] = $name5;
                                            $hid6=$row6['uid'];
                                            $nameArray6[] = $row6['uid']; 
                                            $idr++;
                                            $namefn6[] = $row6['fn'].' '. $row6['mn'].' '.$row6['ln'];
                                            $name6 = $row6['fn'].' '. $row6['mn'].' '.$row6['ln'];

                                            $rp6 = "SELECT sum(amt) as stp FROM purchase where id='$hid6'";
                                            $rresult6 = mysqli_query ($conn, $rp6); 
                                            $rrow6 = mysqli_fetch_assoc($rresult6);
                                            $tstp6=$rrow5['stp'];
                                            if($tstp6==""){
                                            $tstp6=0;
                                            }
                                            $sumpurchase6 += $tstp6;
                                            $tp6[]=$tstp6;

                                                $sql7="SELECT * FROM member where sid= '$hid6'";
                                                $result7 = mysqli_query($conn,$sql7);
                                                while($row7 = mysqli_fetch_array($result7)) {
                                                 $sp7[] = $name6;
                                                $hid7=$row7['uid'];
                                                $nameArray7[] = $row7['uid'];
                                                $idr++;
                                                $namefn7[] = $row7['fn'].' '. $row7['mn'].' '.$row7['ln'];
                                                $name7 = $row7['fn'].' '. $row7['mn'].' '.$row7['ln'];    

                                                $rp7 = "SELECT sum(amt) as stp FROM purchase where id='$hid7'";
                                                $rresult7 = mysqli_query ($conn, $rp7); 
                                                $rrow7 = mysqli_fetch_assoc($rresult7);
                                                $tstp7=$rrow7['stp'];
                                                if($tstp7==""){
                                                $tstp7=0;
                                                }
                                                $sumpurchase7 += $tstp7;
                                                $tp7[]=$tstp7;

                                                    $sql8="SELECT * FROM member where sid= '$hid7'";
                                                    $result8 = mysqli_query($conn,$sql8);
                                                    while($row8 = mysqli_fetch_array($result8)) {
                                                     $sp8[] = $name7;
                                                    $hid8=$row8['uid'];
                                                    $nameArray8[] = $row8['uid'];
                                                    $idr++;
                                                    $namefn8[] = $row8['fn'].' '. $row8['mn'].' '.$row8['ln'];
                                                    $name8 = $row8['fn'].' '. $row8['mn'].' '.$row8['ln'];
                                                        
                                                    $rp8 = "SELECT sum(amt) as stp FROM purchase where id='$hid8'";
                                                    $rresult8 = mysqli_query ($conn, $rp8); 
                                                    $rrow8 = mysqli_fetch_assoc($rresult8);
                                                    $tstp8=$rrow8['stp'];
                                                    if($tstp8==""){
                                                    $tstp8=0;
                                                    }
                                                    $sumpurchase8 += $tst8;
                                                    $t8[]=$tstp8;

                                                        $sql9="SELECT * FROM member where sid= '$hid8'";
                                                        $result9 = mysqli_query($conn,$sql9);
                                                        while($row9 = mysqli_fetch_array($result8)) {
                                                         $sp9[] = $name8;
                                                        $hid9=$row9['uid'];
                                                        $nameArray9[] = $row9['uid'];
                                                        $idr++;
                                                        $namefn9[] = $row9['fn'].' '. $row9['mn'].' '.$row9['ln'];
                                                        $name9 = $row9['fn'].' '. $row9['mn'].' '.$row9['ln'];
                                                        
                                                        $rp9 = "SELECT sum(amt) as stp FROM purchase where id='$hid9'";
                                                        $rresult9 = mysqli_query ($conn, $rp9); 
                                                        $rrow9 = mysqli_fetch_assoc($rresult9);
                                                        $tstp9=$rrow9['stp'];
                                                        if($tstp9==""){
                                                        $tstp9=0;
                                                        }
                                                        $sumpurchase9 += $tst9;
                                                        $t9[]=$tstp9;    

                                                            $sql10="SELECT * FROM member where sid= '$hid9'";
                                                            $result10 = mysqli_query($conn,$sql10);
                                                            while($row10 = mysqli_fetch_array($result10)) {
                                                             $sp10[] = $name9;
                                                            $hid10=$row10['uid'];
                                                            $nameArray10[] = $row10['uid'];
                                                            $idr++;
                                                            $namefn10[] = $row10['fn'].' '. $row10['mn'].' '.$row10['ln'];

                                                            $rp10 = "SELECT sum(amt) as stp FROM purchase where id='$hid10'";
                                                            $rresult10 = mysqli_query ($conn, $rp10); 
                                                            $rrow10 = mysqli_fetch_assoc($rresult10);
                                                            $tstp10=$rrow10['stp'];
                                                            if($tstp10==""){
                                                            $tstp10=0;
                                                            }
                                                            $sumpurchase10 += $tst10;
                                                            $t10[]=$tstp10;    
                                                            }
                                                   } }
                                                }
                                            }
                                        }

                                    }

                                }

                            } 
                                                                      
                       }



   
                          




                     

 
           


?>

<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Direct Downlines | Natural Herbs</title>
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
        <li><a href="updatenew.php"><i class="fa fa-gears"></i> <span>Edit Account</span></a></li>
        <li class="active"><a href="direct.php"><i class="fa fa-link"></i> <span>Direct Recruit</span></a></li>
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
        Direct Downlines
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Direct Downlines</li>
      </ol>
    </section>

    <!-- Main content -->
  <form method="post">  
    <section class="content">


        <div class="row">
        
            <div class="col-lg-12 col-xs-6">
            <div class="box">
            <div class="box-header">
            <div class="box-body">

          
            <h3 class="no-margins font-extra-bold text-success">LIST <div id="lvl"></div> &nbsp; </h4>
              <hr>
             <div class="col-lg-2 col-xs-6">
              

             </div>
           
              <div class="col-lg-10 col-xs-6">
                 <br>
                </div>
                          
                        <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>ID NUMBER</th>
                    <th>FULLNAME</th>
                    <th>DATE REGISTERED</th>
                    
                </tr>
                </thead>

                        <tbody>


                     <?php
                     
                      $sql="SELECT * FROM member where sid='$id'";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                        

                         
                        echo"<tr>";
                           echo"<td>";
                           echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$row['uid'].'</h4></div>';  
                              
                          echo"</td>";
                          echo"<td>";
                          echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$row['fn'].' '.$row['mn'].' '.$row['ln'].'</h4></div>'; 
                             
                          echo"</td>";
                          echo"<td>"; 
                          echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$row['dat'].'</h4></div>';  
                            
                          echo"</td>";

                          
                      echo"</tr>";                   
                       }

                    ?>

                  
                    </table>

                </div>       
            </div>
        </div>
         
        </div>
</div>


      </div>

      <!-- Your Page Content Here -->

    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->



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
 
</script>









<script>















    jQuery(document).ready(function($){
        var nxt = 0;
      $('#save').click(function(){
       

        if(nxt==8){
            nxt =1;
        }else{
             nxt ++;
        }

                $.ajax({                
                    type: "POST",
                    async: "false",
                    url: "unilevel.php",
                    data: { text1: nxt },
                    success: function(html) {
                    if(html)
                      { 
                        var val = html;
                            $('#lvl').html(nxt);
                            $('#cont').html(val);                                                                                           
                      }
                     else
                     {
                      return false; 
                     }
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
