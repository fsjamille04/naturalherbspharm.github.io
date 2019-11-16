<?php
include ('dbconnection.php');

      session_start();
    $id = $_SESSION['pdid2'];
    if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
       header("location: login1.php");
      exit();
    }

?>

<?php
      include 'header_nav.php'; 
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration of Products
       
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
    <p class="login-box-msg">Register a new product</p>
     
    <form method="post">
      <div class="form-group has-feedback">
         <input type="text" placeholder="Productname" required="" value="" name="pn" id="pn" class="form-control">
       
      </div>  
      <div class="form-group has-feedback">
        <input type="text" placeholder="SRP" required="" value="" name="srp" id="srp" class="form-control">
      
      </div>
      <div class="form-group has-feedback">
       <input type="text" placeholder="Distributor" required="" value="" name="dis" id="dis" class="form-control">
        
      </div>
      



      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"name="submits" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!--
         /.col -->
         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
                              <?php
     




                                 if (isset($_POST['submits'])) {
                $pn = $_POST['pn']; 
                $dis = $_POST['dis'];
                $srp = $_POST['srp'];

                $sql = "INSERT IGNORE INTO product (pn,dis,srp)
                VALUES ('$pn','$dis','$srp')";
                if ($conn->query($sql) === TRUE) { 

                                        $sql2="SELECT max(reg) as max FROM product";
                                        $result2 = mysqli_query($conn,$sql2);
                                        while($row2 = mysqli_fetch_array($result2)) {
                                            $max = $row2['max'];
                                        }


                                     $sql = "INSERT IGNORE INTO prodqty (pid,qty)
                                    VALUES ('$max','0')";

                                    if ($conn->query($sql) === TRUE) { 

                                      echo "<script>alert('saved');</script>";

                                    }

                }

    }  


                                    ?>

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
