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
      </section>

      <!-- Main content -->
    
      <section class="content">


          <div class="row"> 
              <div class="col-lg-12 col-xs-12"> 
              <div class="box">
              <div class="box-header">
              <div class="box-body">
              <div class="panel-body">
                  
                  <form method="post">  
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr> 
                          <th class="text-center" >Date Added Capital</th>  
                          <th class="text-center" >Month Payout</th>    
                          
                      </tr>
                    </thead>
                    <tbody> 
                      <?php  
                      $uid = $_GET['id'];

                      $sql="SELECT * FROM capital WHERE userid = '$uid'  ";
                      $result = mysqli_query($conn,$sql); 

                      $sql2="SELECT * FROM member_newpackage WHERE userid = '$uid'  ";
                      $result2 = mysqli_query($conn,$sql2); 
                      while ( $row2 = mysqli_fetch_array($result2) ){   
                          

                        ?>
                        <tr>
                          <td class="text-center"> Monthly Payout ( Para sa walay capital ) </td>
                          <td class="text-center" >   
                            <button type="button"  class="payoutlist btn btn-success btn-payout " value="<?php echo $row2['userid'] ?>"  data-userid="<?php echo $row2['userid'] ?>"   > <span class="glyphicon glyphicon-briefcase" ></span> Payout </button>
                          </td>   
                        </tr> 
                      

                    <?php       }   
                        while( $row = mysqli_fetch_array($result) ) {  
                          $date_created = $row['date_created']; 
                        
                          $style =  '';
                          if( $row['payout_stat']=='done' ){
                            $disabled =  'disabled'; 
                            $btn = 'btn-danger';
                          }else{
                            $disabled = '';
                            $btn = 'btn-success';
                          }
                          if( $row['counting']=='1' ){
                            $month_payout = 'FIRST MONTH';
                          }
                          if( $row['counting']=='2' ){
                            $month_payout = 'SECOND MONTH';
                          }
                          if( $row['counting']=='3' ){
                            $month_payout = 'THIRD MONTH';
                          }
                          if( $row['counting']=='4' ){
                            $month_payout = 'FOURTH MONTH';
                          }
                          if( $row['counting']=='5' ){
                            $month_payout = 'FIFTH MONTH';
                            $style = ' style="border-bottom: 5px solid red" ';
                          }   
                          // echo "<pre>";
                          // print_r($row);
                          // echo "</pre>";
                         ?>
                        <tr <?php echo $style; ?>>
                          <td class="text-center"><?php echo $row['date_created']; ?></td>
                          <td class="text-center" ><b><?php echo $month_payout; ?></b> <?php echo $row['date_nextpayout']; ?>
                            <button type="button"  class="payoutlist btn <?php echo $btn; ?> btn-payout " value="<?php echo $row['userid'] ?>" data-date = "<?php echo $row['date_nextpayout'] ?>" data-id="<?php echo $row['id'] ?>" data-userid="<?php echo $row['userid'] ?>"  <?php echo $disabled ?>> <span class="glyphicon glyphicon-briefcase" ></span> Payout </button>
                          </td>  
                          
                        </tr> 
                      <?php  } 
  ?>
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
                var cap_id = $('#cap_id').val();  

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
                    cap_id : cap_id,
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
          var date_payout = $(this).attr('data-date'); 
          console.log({date_payout});
          var userid = $(this).attr('data-userid');
          var id = $(this).attr('data-id');
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
              id:id,
              date_payout : date_payout
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
