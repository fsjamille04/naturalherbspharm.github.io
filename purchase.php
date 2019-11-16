<?php
include ('dbconnection.php');

    session_start();
    $id = $_SESSION['pdid2'];
    if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
       header("location: login1.php");
      exit();
    }

    if( isset($_POST['submits']) ) {
        $get = mysqli_query ($conn, "SELECT * FROM member where uname='".$_POST['uname']."'");
        while( $get_data =  mysqli_fetch_assoc($get) ){
            $res_get_data[] = $get_data;
        }
        $srp = $_POST['srp'];
        $pids = $_POST['pids'];
        $mid = $res_get_data[0]['uid'];
        $qty = $_POST['qty'];
        $rb = $_POST['rb'];
          

        $x = 1; 
        $gs = 0;  
        $hid= $mid;

        $hdat = gmdate("Y-m-d");
        $time=strtotime($hdat);
        $month=date("m",$time);
        $year=date("Y",$time);
        
        $status_new = ($res_get_data[0]['status_new'] =='new' || $res_get_data[0]['status_new'] =='')? 'new'  : '700' ;  

        
        $sql = "INSERT INTO purchase (pid,id,price,dat,qty,amt,status_new,notify_payout)
        VALUES ('$pids','$mid','$srp','$hdat','$qty','$rb','$status_new','notify')";
        if ($conn->query($sql) === TRUE) {                         

        }
     $new_sql = "INSERT INTO new_purchase (pid,id,price,dat,qty,amt,status_new,notify_payout)
        VALUES ('$pids','$mid','$srp','$hdat','$qty','$rb','$status_new','notify')";
        if ($conn->query($new_sql) === TRUE) {                         

        }








        while($x <= 10) {
            $query = "SELECT * FROM member where uid='$hid'";
            $result = mysqli_query ($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                    $hid=$row['sid'];
            }

                if($hid=='2'){
                              $x=10;
                              }else{
                                    if($x==1){
                                        $gs = ($srp * 0.03) * $qty;

                                        $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                          
                                              $sumra = $row2['one'] + $gs;
                                              $results = $conn->query("UPDATE rebates SET one='$sumra',notify_payout = 'notify' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' "); 
                                            
                                            }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('$gs','0','0','0','0','0','0','0','0','$hid','$hdat','new','notify')";
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
                                            $results = $conn->query("UPDATE rebates SET two='$sumra',notify_payout = 'notify'  where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','$gs','0','0','0','0','0','0','0','$hid','$hdat','new','notify')";
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
                                            $results = $conn->query("UPDATE rebates SET three='$sumra',notify_payout = 'notify'  where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'  "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','0','$gs','0','0','0','0','0','0','$hid','$hdat','new','notify')";
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
                                            $results = $conn->query("UPDATE rebates SET four='$sumra',notify_payout = 'notify'  where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'  "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','0','0','$gs','0','0','0','0','0','$hid','$hdat','new','notify')";
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
                                            $results = $conn->query("UPDATE rebates SET five='$sumra' ,notify_payout = 'notify' where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'  "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','0','0','0','$gs','0','0','0','0','$hid','$hdat','new','notify')";
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
                                            $results = $conn->query("UPDATE rebates SET six='$sumra',notify_payout = 'notify'  where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'  "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','0','0','0','0','$gs','0','0','0','$hid','$hdat','new','notify')";
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
                                            $results = $conn->query("UPDATE rebates SET seven='$sumra',notify_payout = 'notify'  where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'  "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','0','0','0','0','0','$gs','0','0','$hid','$hdat','new','notify')";
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
                                            $results = $conn->query("UPDATE rebates SET eight='$sumra',notify_payout = 'notify'  where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'  "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','0','0','0','0','0','0','$gs','0','$hid','$hdat','new','notify')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }


                                    } 
                                    if($x==9){
                                        $gs = ($srp * 0.02) * $qty;

                                        $query2 = "SELECT * FROM rebates where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month' ";
                                        $result2 = mysqli_query ($conn, $query2);
                      
                                          if($result2->num_rows !=0){   
                                          while ($row2 = mysqli_fetch_assoc($result2)) {
                                        
                                            $sumra = $row2['nine'] + $gs;
                                            $results = $conn->query("UPDATE rebates SET nine='$sumra',notify_payout = 'notify'  where id =  '$hid' and YEAR(dat) = '$year' and MONTH(dat) = '$month'  "); 
                                          
                                          }        
                                          }else{
                                          $sql = "INSERT INTO rebates (one,two,three,four,five,six,seven,eight,nine,id,dat,status_new,notify_payout)
                                          VALUES ('0','0','0','0','0','0','0','0','$gs','$hid','$hdat','new','notify')";
                                          if ($conn->query($sql) === TRUE) {                         

                                          }

                                        }


                                    } 

                                    

                                                                     



                              }


               $x++;                    
           }

    }    



   
 

          
?>
 

<?php  include "header_nav.php" ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Re-purchase Products
       
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
