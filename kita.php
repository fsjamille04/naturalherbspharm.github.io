<?php
include ('dbconnection.php');

       session_start();
    $id = $_SESSION['pdid2'];
    if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
       header("location: login1.php");
      exit();
    }




           


?>





<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kit A | Natural Herbs</title>
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
      <span class="logo-mini">Generate Codes</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Generate Codes</span>
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
                  <small>Admin Personel</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="admin-dashboard.php" class="btn btn-default btn-flat">Dashboard</a>
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
        <li><a href="purchase.php"><i class="fa fa-link"></i> <span>Re-Purchase</span></a></li>
        <li><a href="prodreg.php"><i class="fa fa-table"></i> <span>Product Registration</span></a></li>

        <li class="active"><a href="secode.php"><i class="fa fa-gears"></i> <span>Kit A</span></a></li>
        <li><a href="secode.php"><i class="fa fa-gears"></i> <span>Kit B</span></a></li>
        <li><a href="secode.php"><i class="fa fa-gears"></i> <span>Kit C</span></a></li>
        <li><a href="secode.php"><i class="fa fa-gears"></i> <span>Kit D</span></a></li>

        <li><a href="request.php"><i class="fa fa-money"></i> <span>Payable Withdrawal</span></a></li>
        <li><a href="done.php"><i class="fa fa-money"></i> <span>Paid Withdrawal</span></a></li>
        <li><a href="login1.php"><i class="fa fa-mail-reply"></i> <span>Logout</span></a></li>
        
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
        Generate kit A Codes
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
  <form method="post">  
    <section class="content">


        <div class="row">
        
            <div class="col-lg-12 col-xs-12">
            <div class="box">
            <div class="box-header">
            <div class="box-body">

          
            
             
                   <button type="button" class="btn btn-success"
        data-toggle="modal" data-target="#myModal10">
        Add Kit A Codes
</button>
              <hr>
             <div class="col-lg-2 col-xs-12">
           

             </div>
           
              <div class="col-lg-10 col-xs-12">
                 <br>
                </div>
                          
                         <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>NUMBER</th>
                    <th>USER ID</th>
                    <th>Kit A USER PIN</th>
                   
                    

                    
                </tr>
                </thead>

                        <tbody>


                     <?php
                     
                      $sql="SELECT * FROM kita where stat=''";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                          $num+=1;
                      echo"<tr>";
                        
                          echo"<td>"; 
                              echo $num;
                          echo"</td>";
                          echo"<td>"; 
                              echo $row['id'];
                          echo"</td>";

                          echo"<td>"; 
                              echo $row['pin'];
                          echo"</td>";
                      echo"</tr>";                   
                       }

                    ?>


                         </tbody>   
                        
                  
                    </table>
                </div>       
            </div>
        </div>
         
        </div>
</div>


      </div>

      <!-- Your Page Content Here -->



      <div class="modal fade hmodal-danger" id="myModal10" tabindex="-1" role="dialog"  aria-hidden="true">
                    <form method="post">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">Natural Herbs Security code</h4>
                                
                            </div>
                            <div class="modal-body">
                                
                                <div class="form-group col-lg-12">
                                <label>How many codes?</label>
                                 <input type="text" placeholder="Enter Amount" required="" value="" name="amt" id="amt" class="form-control">
                                </div>


                                

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary"name="save"id="save">Create</button>
                            </div>
                        </div>
                    </div>
                </div>


               



            </form>




    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
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
        $('#save').click(function(){
        var id = $("#amt").val();
        if(id==''){
            swal("Opps!",id + " Please enter amount!", "warning")
        }else{ 
           //swal("Good job!",id + " Code Created!", "success")
        

         $.ajax({
          type: "POST",
          async: "false",
          url: "kitacode.php",
          data: { text2: id },
          success: function(html) {
            
           if(html)
            { 
              var res = html;
              
               location.reload();
            }
           else
           {
            return false; 
           }
         }
       });
               
      
     
      }
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
