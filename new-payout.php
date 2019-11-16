  <?php
  include ('dbconnection.php');

        session_start();
      $id = $_SESSION['pdid2'];
      if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
         header("location: login1.php");
        exit();
      }


       $main_notify = mysqli_query($conn,'SELECT id FROM new_purchase WHERE notify_payout = "notify"');
       while($main_notify1 = mysqli_fetch_assoc($main_notify)) {
        $main= $main_notify1;
       }
       $rebates_notify = mysqli_query($conn,'SELECT id FROM rebates WHERE notify_payout = "notify"');
       while($rebates_notify2 = mysqli_fetch_assoc($rebates_notify)) {
        $rebates[] = $rebates_notify2;
       }
       $rebates = array_column($rebates, 'id');
       $rebates[] = $main['id']; 

  ?>




  <!DOCTYPE html>
  <input type="hidden" name="main_notify" id="main_notify" value="<?php echo $main; ?>">
  <input type="hidden" name="rebates_notify"  id="rebates_notify" value="<?php echo $rebates; ?>">
  <html>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Request Payouts | Natural Herbs</title>
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

    <link rel="stylesheet" href="bootstrap/css/datepicker_css.css">
    <script src='js/datepicker_js.js' type='text/javascript'></script>
  </head>

  <style type="text/css">
  @media print {
    body * {
      visibility: hidden;
    }
    #PrintModal,
    #PrintModal * {
         visibility:visible;
         /* margin-top:-1px;*/
             
    }
    #PrintModal {
      position: absolute;
      left: 0;
      top: 0; 
    }
    #PrintModal table{
      padding-left: 20px !important;
    }
    #PrintModal table.payout_table, table.payout_table td, table.payout_table th {
      padding-right: 15px !important;
      padding-bottom: : 0 !important; 
      font-size: 10px;
    }
    #PrintModal table#unilvl_bonus2, table#unilvl_bonus2 td, table#unilvl_bonus2 th {
      padding-right: 28px !important;
      padding-bottom: : 0 !important; 
      font-size: 10px;
    }
    #PrintModal input.fix_input{
      margin-left: 60px !important;
    }
  }
  #loading-indicator {
      position: absolute;
      left: 50px;
      top: 50px;
    }
   /* table.payout_table, table.payout_table td, table.payout_table th{ 
      padding-right: 75px;
      padding-left:  5px; 
      padding-bottom: 5px;
    }
    table.unilvl_bonus2, table.unilvl_bonus2 td, table.unilvl_bonus2 th{ 
      padding-right: 85px;
      padding-left:  5px; 
      padding-bottom: 5px;
    }*/
    .new-package li{
      height: auto !important;
    } 
    .new-package li a{
      color: white !important;
    }
    .new-package li:hover {
      background-color: white !important;
    }
    .new-package li a:hover{
      color: black;
      background-color: #3c8dbc !important;
    } 
     
  </style>
  
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

<?php include "header_nav_new.php"  ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
     <!--    <h1>
          REQUEST PAYOUTS
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol> -->
      </section>

      <!-- Main content -->
    
      <section class="content">


          <div class="row">
              <div class="col-md-3">
                  <label>Invoice Date From : </label> 
                  <input type='text' class="form-control datetimepicker1" id="datetimepicker1" />
                  <input type="hidden" name="date1" id="newdate1">
                </div>
                <div class="col-md-3">
                  <label> To :</label>     
                  <input type='text' class="form-control datetimepicker1" id="datetimepicker2" />  
                  <input type="hidden" name="date2" id="newdate2">
                </div>
              <div class="col-lg-12 col-xs-12"> 
              <div class="box">
              <div class="box-header">
              <div class="box-body">
              <div class="panel-body">
                  
                  <form method="post">  
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr> 
                          <th>User ID</th>  
                          <th>Fullname</th>   
                          <th class="text-center">Total Monthly Maintenance</th> 
                          <th class="text-center">Total Capital Invest</th> 
                          <th class="text-center">Capital Date Added</th> 
                          <th class="text-center">Next Payout</th> 
                          <th class="text-center">Payout Date</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php  
                      $sql="SELECT * FROM member_newpackage";
                      $result = mysqli_query($conn,$sql); 
                      while($row = mysqli_fetch_array($result)) {
                         ?>
                        <tr>
                          <td><?php echo $row['userid']; ?></td>
                          <td><?php echo $row['fullname']; ?></td>  
                          <td class="text-center"><?php 
                              $sqq =  "SELECT count(amt) as count_amount FROM new_purchase WHERE id =  ".$row['userid']." AND payout_stat != 'done' " ;  
                          $s = mysqli_query( $conn,$sqq  ); 
                          $mon_pur = mysqli_fetch_assoc( $s ); 

                          echo number_format($mon_pur['count_amount']);
                            ?></td>
                          <td class="text-center">
                              <?php  
                          $sq =  "SELECT SUM(capital) as cap  FROM capital WHERE userid =  ".$row['userid']."  " ;  
                          $r = mysqli_query( $conn,$sq  ); 
                          $capital = mysqli_fetch_assoc( $r );  
                          echo number_format($capital['cap']); ?> 
                          </td> 
                         <td class="text-center">
                              <?php  
                          $sq =  "SELECT date_created  FROM capital WHERE userid =  ".$row['userid']."  " ;  
                          $r = mysqli_query( $conn,$sq  ); 
                          $date_created = mysqli_fetch_assoc( $r );  
                          echo  $date_created['date_created'] ; ?> 
                          </td> 
                          <td class="text-center">
                              <?php  
                          $sq =  "SELECT date_nextpayout  FROM capital WHERE userid =  ".$row['userid']."  " ;  
                          $r = mysqli_query( $conn,$sq  ); 
                          $date_nxtpyout = mysqli_fetch_assoc( $r );  
                          echo  $date_nxtpyout['date_nextpayout'] ; ?> 
                          </td>  
                          <td class="text-center"> <button type="button"  class="payoutlist btn btn-success btn-payout" value="<?php echo $row['userid'] ?>" data-id="<?php echo $row['userid'] ?>" > <span class="glyphicon glyphicon-briefcase" ></span> Payout </button></td>
                        </tr> 
                      <?php } ?>
                        </tbody>  

                    
                      </table>
                 
                         </form>
                  </div>       
              </div>
                </div>
                 
            </div>
        </div>
        </div>
       
        </section>
       
          </div> 
    </div> 
  <div class="modal fade hmodal-danger" id="printSection" tabindex="-1" role="dialog"  aria-hidden="true">
                 
      <div class="modal-dialog modal-md">
          <div class="modal-content">
              <div class="color-line"></div>
              <div class="modal-header">
                  
              </div>
             <!--  <form action="#" method="POST" role="form" >  --> 
                   <div class="modal-body"  id="PrintModal" >
                    
                    <img src="images/loader.gif" id="loading-indicator" style="display:none; text-align: center;" />
                    
                   </div>
                 <div class="modal-footer">
                       
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="payout_admin" id="payout_admin" onclick="printDiv()">Payout</button> 
                    </div> 
        </div>
      </div>

  </div>

  <div class="modal fade hmodal-danger" id="printAdminSection" tabindex="-1" role="dialog"  aria-hidden="true">
                     
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="color-line"></div>
                  <div class="modal-header">
                      
                  </div>
                 <!--  <form action="#" method="POST" role="form" >  --> 
                       <div class="modal-body"  id="printAdminSectionModal" >
                       
                       </div>
                     <div class="modal-footer">
                           
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="payout_admin_2" id="payout_admin_2">Payout</button>
                             
                        </div>
                 <!--  </form> -->
            </div>
        </div>

    </div>


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
    $('.datetimepicker1').datepicker(); 
   function printDiv() {
        window.print();
      }
       window.onafterprint = function() { 
        
                var userid = $('#idMember').attr('data-id');
                var date = $('#date').val(); 
                  
                var lvl1_in2500 = parseInt($('#lvl1_in2500').val()); 
                var lvl2_in2500 = parseInt($('#lvl2_in2500').val()); 
         
                var mainpur2500 = parseInt($('#mainpur2500').val()); 
                var lvl12500 = parseInt($('#lvl12500').val()); 

                var cnt_750bonus = parseInt($('#cnt_750bonus').val()); 
                var capital_inve = parseInt($('#capital_inve').val()); 
                 
                var total = parseFloat($('#total').val());  
            
              
                $.ajax({
                  type : 'POST',
                  url: 'function.php',
                  datatype:'JSON',
                  data:{
                    action: "finish_submit_payout",
                    
                    userid : userid,    
                    lvl1_in2500 : lvl1_in2500,
                    lvl2_in2500 : lvl2_in2500, 
                    mainpur2500 : mainpur2500,
                    lvl12500 : lvl12500,
                    cnt_750bonus : cnt_750bonus,
                    capital_inve : capital_inve,
                    total: total
                  },
                  
                  success: function(data){
                     console.log(data);
                    $('#printAdminSectionModal').html(data);
                    //location.reload();
                	alert(data);
                  }
                });

              };
                 $('#loading-indicator').show();   
  jQuery(document).ready(function(){ 

 
      $('#PrintModal').html();
      $('#datetimepicker1').change(function(){
        var date1 = $('#datetimepicker1').val(); 
        $('#newdate1').val(date1); 
      })  
      $('#datetimepicker2').change(function(){
        var date2 = $('#datetimepicker2').val(); 
        $('#newdate2').val(date2);
      });  
       
      
      $('.payoutlist').click(function(){ 
        $('#PrintModal').append(); 
          var date1 = $('#newdate1').val();
          var date2 = $('#newdate2').val();
           var userid = $(this).attr('data-id');
          // if( $('#datetimepicker1').val() != '' && $('#datetimepicker2').val() != ''  ){
            $('#printSection').modal('show'); 
          // } else{
          //   alert("SELECT DATE FIRST");
          // }
             
        
       
        $.ajax({
          type : 'POST',
          datatype: 'JSON',
          url: 'function.php',
          data:{
            action : 'show_payout',
            userid : userid,
            date1 : date1,
            date2 : date2,
          },
          datatype:'text',
          success: function(data){
             $('#loading-indicator').hide();
            $('#PrintModal').html(data); 
       
          }
        });
          
      });

  });
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
            $('#example2').dataTable( {

              dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
              "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
              buttons: [
                  {extend: 'copy',className: 'btn-sm'},
                  {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                  {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                  {extend: 'print',className: 'btn-sm'}
              ]
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
