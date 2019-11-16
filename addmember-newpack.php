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
  <title>Admin Dashboard | Natural Herbs</title>
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
  </style>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include "header_nav_new.php"  ?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <section class="content-header">
    <h1>
      Register New Member  
    </h1> 
  </section> 
  <section class="content"> 
    <div class="row">
      <div class="box">
        <div class="box-header">
          <div class="box-body"> 
            <div class="register-box">
              <div class="register-logo">
                <h1>Natural Herbs Pharm</h1>
              </div>
            <div class="register-box-body">
              <p class="login-box-msg">Register a new membership</p>
              <!-- <small>ID # : <?php echo $id; ?></small> <br><br> -->
                <form method="post" id="2500_packageForm"> 
                  <div class="form-group has-feedback">
                    <input type="number" placeholder="Sponsor ID" required  value="" name="sponsor_id" id="sponsor_id" class="form-control">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" placeholder="" value="" name="sname" id="sname" class="form-control " readonly required  >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div> 
                  <div class="form-group has-feedback">
                    <input type="text"placeholder="Fullname" value="" id="fullname" class="form-control" name="fullname" required="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>  
                  <div class="form-group has-feedback">
                    <input type="text"placeholder="Address" value="" id="address" class="form-control" name="address" required="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div> 
                  <div class="form-group has-feedback">
                    <input type="number" value="" id="phone" class="form-control" name="phone" required="" placeholder="Phonenumber">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>   

                  <div class="form-group has-feedback">
                    <input type="number" value="" id="check_userid" class="form-control" name="check_userid" required="" Placeholder="UserID">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div> 

                  <div class="form-group has-feedback">
                    <input type="text" value="" id="code" class="form-control " readonly name="code" required="" Placeholder="" >
                    <span class="fa fa-bell-o form-control-feedback"></span>
                  </div> 
                  <div class="form-group has-feedback">
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
                  </div>
                  <div class="form-group">
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" id="date" placeholder="Date" class="form-control datepicker" required="">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                  </div> 
                  <div class="row"> 
                    <div class="col-xs-4">
                      <input type="submit"name="new_register"  value="Register" id="2500_package" class="btn btn-primary btn-block btn-flat">  
                  </div> 
                </form> 
              </div> 
            </div>     
          </div>
        </div>
      </div>
    </div> 
  </section>   
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
 
$('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd'
});
$(".readonly").on('keydown paste', function(e){
      e.preventDefault();
  });
jQuery(document).ready(function($){ 

$('#sponsor_id').keyup(function(){
  var sponsid = $(this).val();
  $.ajax({
    type: "POST", 
    url: "function.php",
    data:{
      action: "check_sponsor",
      sponsid: sponsid
    },
    success:function(data){  
      if(data != 'fail'){
        var data = JSON.parse(data);
        $('#sname').attr('data-id','1'); 
        $('#sname').attr('placeholder', data.fullname);
        $('#sname').css('border', '2px solid green');
        $('#sname').css('border-radius', '2px');

      }else{
        $('#sname').attr('placeholder','No Sponsor found');
        $('#sname').attr('data-id','0'); 
        $('#sname').css('border', '2px solid red');
        $('#sname').css('border-radius', '2px');
      }
    }
  });   

});
$('#check_userid').keyup(function(){
  var userid = $(this).val();
  $.ajax({
    type: "POST", 
    url: "function.php",
    data:{
      action: "check_userid_tbpin",
      userid: userid
    },
    success:function(data){  
      if(data == 'fail'){
        $('#code').attr('placeholder',' UserID isn`t available ');
        $('#code').attr('data-id','0');  
        $('#code').css('border', '2px solid red');
        $('#code').css('border-radius', '2px');
      }else{  
        var data = JSON.parse(data); 
        if(data.stat == 'used'){
          $('#code').attr('placeholder',' UserID is alread used ');    
          $('#code').attr('data-id','0'); 
          $('#code').css('border', '2px solid red');
          $('#code').css('border-radius', '2px');
        }else{
          $('#code').attr('placeholder',' UserID is available ');    
          $('#code').attr('data-id','1'); 
          $('#code').css('border', '2px solid green');
          $('#code').css('border-radius', '2px');
        } 
      }
    }
  });
});

$('#2500_packageForm').submit(function(){

  var sponsid = $('#sponsor_id').val();
  var fullname = $('#fullname').val();
  var sname = $('#sname').attr('data-id');
  var code = $('#code').attr('data-id');
  var address = $('#address').val();
  var phone = $('#phone').val();
  var check_userid = $('#check_userid').val();
  var pick_up = $('#pick_up').val();
  var date = $('#date').val(); 
  if( sname == 1 && code == 1 && date != ''){
    $.ajax({
      type: "POST", 
      url: "function.php",
      data:{
        action: "create_user",
        sponsid: sponsid,
        fullname: fullname,
        address: address,
        phone: phone,
        check_userid: check_userid,
        pick_up: pick_up,
        date: date,
      },
      success:function(data){
        alert(data); 
      }
    });
  }else{
    event.preventDefault();
    alert("Fill all fields");
  }
  
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
