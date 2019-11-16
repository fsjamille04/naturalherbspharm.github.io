<?php
include ('dbconnection.php');

    session_start();
    $id = $_SESSION['pdid3'];
    if(!isset($_SESSION['pdid3']) || (trim($_SESSION['pdid3']) == '')) {
       header("location: stuff.php");
      exit();
    }



   $idr=0;

    
            $sql = "SELECT count(uid) as tot FROM member";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $totmem = $row['tot'];
             
              }
 
              $sql = "SELECT count(id) as tot FROM withdraw where stat=''";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $totpay = $row['tot'];
             
              }


            $sql = "SELECT count(id) as tot FROM withdraw where stat='done'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $paydone = $row['tot'];
             
              }

              $di = $totmem * 850;  


   
            $sql = "SELECT sum(withdraw) as tot FROM withdraw where stat='done'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $pout = $row['tot'];
             
              }           





          
?>







<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff Dashboard | Natural Herbs</title>
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
      <span class="logo-mini">Staff Dashboard</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Staff Dashboard</span>
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
                  <small>Staff Personel</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="admin-dashboard.php" class="btn btn-default btn-flat">Dashboard</a>
                </div>
                <div class="pull-right">
                  <a href="stuff.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="stuff.php"><i class="fa fa-gears"></i></a>
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
          <p>Staff Personel</p>
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
        <li class="active"><a href="stuff-dashboard.php"><i class="fa fa-home"></i> <span>Admin Dashboard</span></a></li>
        <li class=""><a href="member12.php"><i class="fa fa-link"></i> <span>List of Members</span></a></li>
        <li><a href="stuff.php"><i class="fa fa-mail-reply"></i> <span>Logout</span></a></li>
        
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
        Staff Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totmem;  ?></h3>

              <p>Total Members</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totpay;  ?></h3>

              <p>Payable Withdrawal</p>
            </div>
            <div class="icon">
              <i class="fa fa-hand-o-up"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow"data-toggle="modal" data-target="#myModal12">
            <div class="inner">
              <h3><?php echo $paydone;  ?></h3>

              <p>Paid Withdrawal</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-o-up"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      
        

      <!-- Your Page Content Here -->

      <div class="col-lg-12">

           <div class="box">
            <div class="box-header">
            <div class="box-body">
                <div class="hpanel">
                   
                    <div class="panel-body list">

                        
                        <h3 class="no-margins font-extra-bold text-success"> PRODUCTS</h3><br>

                        <small class="fo">Product Sold</small>

                        <small class="fo pull-right">Product Stock</small>

                        

               <table id="example2" class="footable table table-stripped toggle-arrow-tiny" data-page-size="8" data-filter=#filter>
                       
                        <tbody>
                     <?php
                     
                      $sql="SELECT  product.pn,sum(prodqty.qty) as tot,product.reg FROM product join prodqty on prodqty.pid=product.reg  group by prodqty.pid";

                      //$sql="SELECT * FROM product";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {?>








                        <div class="list-item-container">
                            <div class="list-item">
                                
                                    <tr><td>
                                    <h3 class="no-margins font-extra-bold text-success">
                                     <?php
                                     $hpid = $row['reg'];
                                     $sql2="SELECT  sum(purchase.qty) FROM purchase where purchase.pid='$hpid'";
                                        $result2 = mysqli_query($conn,$sql2);
                                        while($row2 = mysqli_fetch_array($result2)) {
                                            
                                            $napalit = $row2['0'];
                                            if( $napalit ==""){
                                               $napalit =  '0';
                                                }
                                              echo $napalit;  

                                        }

                                 ?></h3>

                                <label>
                                <?php echo $row['0']; ?>
                               
                                </label>
                                 <div class="pull-right font-bold">  <a data-toggle="modal"data-userid="<?php echo $row['reg']; ?>"  href="#qw" class="btn btn-s btn-default"><?php

                                 

                                    echo $row['1'] - $napalit;

                                  ?></a><i class="fa fa-level-up text-success"></i></div>
                            </div>
                        </tr></td>
                            <?php } ?>
              
                  
                             </tbody>   
                            <tfoot>
                                <?php
                                echo"<tr>";
                                
                                
                                echo'<tr><td colspan=""><ul class="pagination pull-right"></ul></td></tr>';                                           


                                ?>
                            </tfoot>  

                    </table>



                </div>
            </div>
           
        </div>
</div>
</div>
</div>


        <div class="col-lg-12">
            <div class="box">
            <div class="box-header">
            <div class="box-body">
                <div class="panel-body">
            <h4 class="no-margins font-extra-bold text-danger">LIST OF PAYOUTS</h4><br>
                <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Pick-up Check</th>
                    
                </tr>
                </thead>

                        <tbody>


                      <?php
                     
                      $sql="SELECT withdraw.withdraw,member.fn,member.mn,member.ln,withdraw.dat,withdraw.reg,member.ad FROM withdraw join member on withdraw.id=member.uid where withdraw.stat='done'";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                       
                            $num++;
                         
                      echo"<tr>";
                        
                          echo"<td>"; 
                               echo $num;
                          echo"</td>";
                           echo"<td>"; 
                              echo $row['fn'].' '.$row['mn'].' '.$row['ln'];
                          echo"</td>";

                          echo"<td>"; 
                              echo $row['0'];
                          echo"</td>";

                          echo"<td>"; 
                              echo $row['dat'];
                          echo"</td>";

                          echo"<td>"; 
                              echo $row['ad'];
                          echo"</td>";
                         


                         
                            


                      echo"</tr>";                   
                       }

                    ?>


                         </tbody>   
                            <tfoot>
                                <?php
                                echo"<tr><td></td>";
                                echo"<td><td><strong><h2 class='no-margins font-extra-bold text-danger'>₱ ".number_format($pout,2,'.',',')."</td>";
                                 echo"<td><strong></td>";


                                ?>
                            </tfoot>  

                  
                    </table>

                </div>
                
        </div>
    </div>
</div>












                










              <div class="modal fade hmodal-danger" id="myModal10" tabindex="-1" role="dialog"  aria-hidden="true">
                   
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">Hiyang E-Wallet</h4>
                                
                                <h3> Amount Balance :  <?php echo '₱' . number_format($tamt2,2,'.',','); ?> </h3>

                              

                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" role="form">


                                <div class="form-group col-lg-12">
                                <label>Amount</label>
                                 <input type="text" placeholder="Enter Amount" required="" value="" name="amt" id="amt" class="form-control">
                                </div>

                             
                                

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"name="save"id="save">Withdraw</button>


                                <?php
                                    if (isset($_POST['save'])) {
                                    $amt = $_POST['amt']; 
                                    
                                    
                                                $hdat = gmdate("Y-m-d");
                                                  $sql = "INSERT INTO withdraw (id,dat,lc,rc,withdraw)
                                                  VALUES ('$id','$hdat','$lef','$reg','$amt')";
                                                   if ($conn->query($sql) === TRUE) {
                                                    
                                                    echo "<script> window.location.href = 'dashboard.php'; </script>";   
                                                    }




                                    }
                            
                                ?>

                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>







              <div class="modal fade hmodal-danger" id="myModal11" tabindex="-1" role="dialog"  aria-hidden="true">
                   
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">My Direct Invites</h4>
                                
                               

                              

                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" role="form">


                                <div class="form-group col-lg-12">
                                <label>List</label>
                                 
                                
                                 <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>Id Number</th>
                    <th>Name</th>
                    <th>Date Register</th>
                    
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
                              echo $row['uid'];
                          echo"</td>";
                          echo"<td>"; 
                               echo $row['fn'].' '.$row['mn'].' '.$row['ln'];
                          echo"</td>";
                          echo"<td>"; 
                              echo $row['dat'];
                          echo"</td>";

                          
                      echo"</tr>";                   
                       }

                    ?>

                  
                    </table>

                                </div>

                             
                                

                            <div class="modal-footer">
                               

                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>









               




      




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div class="modal fade" id="qw" tabindex="-1" role="dialog"  aria-hidden="true">
                           <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="color-line"></div>
                                <div class="modal-header">
                                    <h4 class="modal-title"><div id="mres"> </div></h4>
                                    <small class="font-bold"></small>
                                </div>
                                <form method="POST">
                                    
                                <div class="modal-body">
                                    <p><center><strong>Quantity</strong></center> 

                                      <br>
                                      <input id="demo5" type="text" onkeypress="return isIDNumber(event)" name="demo5"  value="0" >
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"name="addprod"id="addprod">Save</button>
                                      <input type="hidden"id="passid"name="passid">
                                      </div>

                                      <?php
                                            if (isset($_POST['addprod'])) {                                              
                                                 $passer = $_POST['passid'];
                                                 $hqty = $_POST['demo5'];

                                                 $sql = "INSERT IGNORE INTO prodqty (pid,qty)
                                                VALUES ('$passer','$hqty')";

            
                                                if ($conn->query($sql) === TRUE) { 

                                                                                }
                                                echo "<script> window.location.href = 'admin-dashboard.php'; </script>";                 

                                                                                }    
                                      ?>

                                    </form>
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




jQuery(document).ready(function($){
   
$('#qw').on('show.bs.modal', function(e) {

  
    var userid = $(e.relatedTarget).data('userid');
 
        $.ajax({        
          type: "POST",
          async: "false",
          url: "modal.php",
          data: { text1: userid },
          success: function(html) {
          if(html)
            { 
              var val = html;
                $('#passid').val(userid);
                $('#mres').html(val);                                
            }
           else
           {
            return false; 
           }
         }
       });
  });
 });  



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
