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
  <title>List of Member | Natural Herbs</title>
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
  <style type="text/css">
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
    #loading-indicator {
        position: absolute;
        left: 50px;
        top: 50px;
    }
    html {
  height: 100% !important;
}
body {
  min-height: 100% !important;
}
  </style>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include "header_nav_new.php"  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of Members
       
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
                      <th>User ID</th>  
                      <th>Fullname</th> 
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Pickup Place</th>  
                      <th>Sponsor ID</th>  
                      <th class="text-center">Edit</th>  
                  </tr>
                </thead>
                <tbody> 
                  <?php  
                  $sql="SELECT * FROM member_newpackage";
                  $result = mysqli_query($conn,$sql); 
                  while($row = mysqli_fetch_array($result)) {
                  	$linkpayout = 'new-payout-2.php?id='.$row['userid'];
                     ?>
                    <tr>
                      <td><?php echo $row['userid']; ?></td>
                      <td><?php echo $row['fullname']; ?></td> 
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['address']; ?></td>  
                      <td><?php echo $row['pick_up_place']; ?></td> 
                      <td><?php echo $row['sponsor_id']; ?></td> 
                      <td class="text-center"> <button type="button" class="btn btn-primary btn-edit" value="<?php echo $row['userid'] ?>"> <span class="glyphicon glyphicon-edit"></span> Edit </button></td>
                    </tr> 
                  <?php } ?>
                    </tbody>   
              </table>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </form>
  <!-- Edit user -->
  <div class="modal fade" id="edit_user" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content"> 
            <div class="modal-header">
                  <h4 class="modal-title">Edit User</h4>
                  <small class="font-bold"></small>
            </div> 
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 user_edit">
                    <label>Fullname</label>
                    <input type="text"placeholder="Fullname" value="" id="fullname" class="form-control" name="fullname" required=""> 
                    <label>Address</label>
                    <input type="text"placeholder="Address" value="" id="address" class="form-control" name="address" required=""> 
                    <label>Phone</label>
                    <input type="number" value="" id="phone" class="form-control" name="phone" required="" placeholder="Phonenumber">  
                    <label>Pick Up</label>
                    <select id="pick_up" name="pick_up" class="form-control" style="width: 100%" required > 
                      <option value="">Pick Up Place</option>
                      <option value="Tagum">Tagum City</option>
                      <option value="Davao">Davao City</option>
                      <option value="Panabo">Panabo City</option>
                      <option value="Mati">Mati City</option>
                      <option value="Butuan">Butuan City</option>
                      <option value="Kapalong">Kapalong</option> 
                      <option value="Surigao">Surigao City</option>
                      <option value="Nabunturan">Nabunturan</option>
                      <option value="Manila">Manila</option>
                      <option value="Caloocan">Caloocan</option>  
                      <option value="Baculod">Baculod</option>
                      <option value="Sto.tomas">Sto.tomas</option>
                      <option value="Digos">Digos City</option>                                             
                    </select>  
                    <label>Date</label>
                    <input type="text" id="date" placeholder="Date" class="form-control  " required="">  
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="save_edituser" id="save_edituser">Submit</button> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>  
<!-- Payout -->
  <div class="modal fade" id="payout_user" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div class="modal-header">
                  <h4 class="modal-title">Payout</h4> 
            </div> 
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 payout_body"> 
                  </div>
                </div> 
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save_payout" id="save_payout">Payout</button> 
            </div>
        </div>
    </div>
</div>  

<!-- Add Capital -->
  <div class="modal fade" id="add-capital-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content"> 
            <div class="modal-header">
                  <h4 class="modal-title">Capital</h4> 
            </div> 

            <div class="modal-body">
                <div class="row">

                  <div class="col-md-12 add-capital-body">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="btn-addcapital" id="submit-addcapital">Add Capital</button> 
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    <div class="form-group">
                      <label>Add Capital to <span class="span_name"> </span> </label>
                      <input class = "form-control" type="number" name="addcapital" id="addcapital"> 
                    </div> 
                    <div class="form-group">
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" id="date2" placeholder="Date" class="form-control datepicker" required="">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                      </div> 
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
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
  $(".btn-add-capital").click(function(){
    var id = $(this).val();
    $('#add-capital-modal').modal('show');
    var name_span = $(this).data('id'); 
    $('.span_name').html(name_span);  
    $('#submit-addcapital').val(id);   
  });

  $("#submit-addcapital").click(function(){
    var userid = $(this).val();
    var date = $('#date2').val();   
    var capital = $('#addcapital').val();  
     console.log({date, capital});

    if(capital != '' && date != ''){
      $.ajax({
        type: "POST",
        url: "function.php",
        data: {
          action : 'add_capital',
          userid:userid,
          capital:capital,
          date:date,
        },
        success:function(data){
          alert(data);
          $('#add-capital-modal').modal('hide');
        }
      }); 
    }else{
      alert('Fill all fields')
    } 
  });
  $(".btn-edit").click(function(){  
    $('#edit_user').modal('show');
    var id = $(this).val(); 
    $.ajax({
      type: "POST",
      url: "function.php",
      data: {
        action : 'edit_user',
        id:id
      },
      success:function(data){
        var data1 = JSON.parse(data); 

        $('#fullname').val(data1.fullname);
        $('#address').val(data1.address);
        $('#phone').val(data1.phone);
        $('#pick_up').val(data1.pick_up_place);
        $('#date').val(data1.date_created); 
        $('#save_edituser').val(data1.userid); 

      }

    });
  });
  $(".btn-payout").click(function(){
    $('#payout_user').modal('show');
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: "function.php",
      data:{
        action: "show_payout",
        id: id
      },
      success:function(data){

      } 
    });
  });  
  $("#save_edituser").click(function(){
    var userid = $(this).val(); 
    var fullname = $('#fullname').val();
    var phone = $('#phone').val();
    var pickplace = $('#pick_up').val();
    var adress = $('#address').val();  
    var date = $('#date').val();  

    $.ajax({
      type : "Post",
      url: "function.php",
      data:{
        action: "save_user_edit",
        userid: userid,
        fullname: fullname,
        phone: phone,
        pickplace: pickplace,
        adress: adress,
        date: date,
      },
      success:function(data){
        if(data == 'success'){  
          alert('Succesfully edited');
          $('#save_edituser').addClass('btn-success');
          $('#save_edituser').removeClass('btn-primary');
          $('#save_edituser').html('Updated'); 
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
