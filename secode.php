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
        Generate Codes
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
             
    <button type="button" class="btn btn-success"
        data-toggle="modal" data-target="#myModal10">
        Add Entry Codes
</button>
              <hr>

           
          <div class="col-lg-12 col-xs-12">
          <div class="box">
          <div class="box-header">
          <div class="box-body">         
          <div class="panel-body">

                          
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NUMBER</th>
                    <th>USER ID</th>
                    <th>USER PIN</th>
                    <th>DATE</th>
                    

                    
                </tr>
                </thead>

                        <tbody>


                     <?php
                     
                      $sql="SELECT * FROM tbpin where stat='' Order by date DESC";
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
                          // if(){
                          echo"<td>"; 
                              echo $row['date'];
                            echo"</td>";
                          // }
                          
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
</div> 
      <div class="modal fade hmodal-danger" id="myModal10" tabindex="-1" role="dialog"  aria-hidden="true">
                
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">Natural Herbs Security code</h4> 
                            </div>  
                            <div class="modal-body"> 
                              <select class="form-control" name="select-code" id="select-code">
                                <option value=""> Select type of code to generate</option>
                                <option value="700">700</option>
                                <option value="1500">1500</option>
                                <option value="2500">2500</option>
                              </select>   
                              <label>How many codes to generate?</label>
                                <input type="text" placeholder="Enter Amount" required="" value="" name="amt" id="amt" class="form-control amt">
                              </div>   
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary save" name="save" id="save" value="" >Create</button>
                            </div>
                        </div>
                    </div>
                </div> 

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



<script>

  jQuery(document).ready(function($){
    $('#select-code').on("change",function(){
      var val = $(this).val();
      $('#save').val(val);
    });
    $('#save').click( function(){
      if($('#select-code').val()!==""){ 
        var stat = $('#save').val();
        var amt = $('#amt').val();
        if(amt==''){
            alert('Enter amount');
        }else{  
         $.ajax({
          type: "POST",
          async: "false",
          url: "savecode.php",
          data: { 
            text1: amt,
            stat : stat 
          },
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
      }else{
        alert('Select types of Codes ');
      } 
    });
          
   });
 
  // $.widget.bridge('uibutton', $.ui.button);
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
