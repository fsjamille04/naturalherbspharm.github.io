<?php
include ('dbconnection.php');

     session_start();
    $id = $_SESSION['pdid2'];
    if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
       header("location: login1.php");
      exit();
    }



    if (isset($_POST['submits'])) {
                $pn = $_POST['pn']; 
                $dis = $_POST['dis'];
                $srp = $_POST['srp'];

                $sql = "INSERT INTO product (pn,dis,srp)
                VALUES ('$pn','$dis','$srp')";

                if ($conn->query($sql) === TRUE) { 
                }

    }    



   
 

          
?>



<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Produc History| Natural Herbs</title>
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

<?php
 include 'header_nav.php'; 
 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product History
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
          
                        <form action="" method="post">

                                <div class="col-lg-12">

             <div class="box">
            <div class="box-header">
          <div class="box-body">         
           <div class="panel-body">
            
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>User ID</th>
                   <!--  <th>Username</th>
                    <th>Password</th> -->
                    <th>Fullname</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>

                        <tbody>


                     <?php
                     
                      $sql="SELECT * FROM purchase ORDER BY dat DESC ";

                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                        
                        
                      $sql1="SELECT * FROM member WHERE uid = '".$row['id']."'";
                      $result1 = mysqli_query($conn,$sql1);
                        while($row1 = mysqli_fetch_array($result1)) {
                         
                        $fullname = $row1['fn']. ' ' . $row1['mn'].' '. $row1['ln']; 
                        $stat = $row1['status_new'];
                        }



                      $sql2="SELECT * FROM product WHERE reg = '".$row['pid']."'";
                      $result2 = mysqli_query($conn,$sql2);
                        while($row2 = mysqli_fetch_array($result2)) {
                        
                          $prdname = $row2['pn'];
                        }


                        $time=strtotime($row['dat']);
                        $month=date("F",$time);
                            $year=date("Y",$time);
                            $num++;
                         
                      echo"<tr>";
                        
                          echo"<td>"; 
                               echo $num;
                          echo"</td>";
                          echo"<td>"; 
                              echo $row['id'];
                          echo"</td>";

                          // echo"<td>"; 
                          //     echo $row['uname'];
                          // echo"</td>";

                          // echo"<td>"; 
                          //     echo $row['upass'];
                          // echo"</td>";

                          echo"<td>"; 
                              echo $fullname;
                          echo"</td>";

                          echo"<td>"; 
                              echo $prdname;
                          echo"</td>";

                           echo"<td>"; 
                              echo $row['qty'];
                          echo"</td>";
                          echo"<td>"; 
                              echo $row['amt'];
                          echo"</td>";
                          echo"<td>"; 
                              echo $stat;
                          echo"</td>";

                          echo"<td>"; 
                              echo $row['dat'];
                          echo"</td>";

                         
                             


                      echo"</tr>";                   
                       }

                    ?>


                         </tbody>   
                            <tfoot>
                                <?php
                                echo"<tr><td><td><td><td></td>";
                                
                                 echo"<td><strong></td>";


                                ?>
                            </tfoot>  

                  
                    </table>
                    </div></div></div>

                </div>
        </div>


                        </form>
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

<script>
  $(function () {
    $("#example1").DataTable();
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

</body>

</html>
