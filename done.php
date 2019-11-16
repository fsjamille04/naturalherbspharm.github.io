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
        DONE PAYOUTS
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
            <div class="panel-body">


                       <table id="example1" class="table table-bordered table-stripedd">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Command</th>
                </tr>
                </thead>

                        <tbody>


                     <?php
                     
                      $sql="SELECT withdraw.withdraw,member.fn, member.mn, member.ln,withdraw.dat,withdraw.reg  FROM withdraw join member on withdraw.id=member.uid where withdraw.stat='done' ";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                        $time=strtotime($row['dat']);
                        $month=date("F",$time);
                            $year=date("Y",$time);
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
                              echo '<a href="print.php?printid='.$row['reg'].'" class="md-trigger btn btn-primary mrg-b-lg"id="'.$row['reg'].'">View</a>';
                          echo"</td>";


                      echo"</tr>";                   
                       }

                    ?>


                         </tbody>   
                            <tfoot>
                                <?php
                                echo"<tr><td></td>";
                                echo"<td><strong></td>";
                                 echo"<td><strong></td>";


                                ?>
                            </tfoot>  

                  
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
          url: "savecode.php",
          data: { text1: id },
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
