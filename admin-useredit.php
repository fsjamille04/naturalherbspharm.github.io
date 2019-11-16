<?php
include ('dbconnection.php');

    session_start();
   $id = $_SESSION['pdid2'];
    if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
       header("location: login1.php");
      exit();
    }


   $sql = "SELECT * FROM member WHERE uid = '$id'";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  

      $uname= $row['uname'];
    }
?>



<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | Natural Herbs</title>
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
   <link rel="stylesheet" href="dist/bootstrap-datepicker.min.css">
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
        Register New Members
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Register</li>
      </ol>
    </section>

    <!-- Main content -->
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
    <form action="" method="post" class="form-edit">
      <?php 
      $getid = $_GET['id']; 
      $sql = "SELECT * FROM member where uid='$getid'";
      $result = mysqli_query ($conn, $sql);
      while ( $row = mysqli_fetch_assoc( $result ) ) {   
      ?>  

      <div class="form-group has-feedback">
        <label>First name</label>
        <input type="text"placeholder="Firstname" value="<?php echo $row['fn'] ?>" id="first_name" class="form-control" name="first_name" ">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Middle name</label>
        <input type="text"placeholder="Middlename" value="<?php echo $row['mn'] ?>" id="mid_name" class="form-control" name="mid_name" ">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Last name</label>
        <input type="text" value="<?php echo $row['ln'] ?>" placeholder="Lastname" id="last_name" class="form-control" name="last_name" ">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Address</label>
        <input type="text"placeholder="Address" value="<?php echo $row['ad'] ?>" id="address1" class="form-control" name="address1" ">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label>Status</label>
        <select name="stat" id="stat" class="form-control" style="width: 100%"   >                       
          <option <?php if( $row['stat']=='Single' ) echo 'selected' ?> value="Single">Single</option>
          <option <?php if( $row['stat']=='Married' ) echo 'selected' ?> value="Married">Married</option>
          <option <?php if( $row['stat']=='Others' ) echo 'selected' ?> value="Others">Others</option> 
        </select>
      </div>
      <div class="form-group has-feedback">
        <label>Phone</label>
        <input type="text" value="<?php echo $row['phone'] ?>" id="phone" class="form-control" name="phone" " placeholder="Phonenumber">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div> 

      <div class="form-group has-feedback">
        <label>Birthday</label>
        <input type="" value="<?php echo $row['dat'] ?>" id="" class="form-control" name="" " placeholder="Birthday">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div> 
<!-- 
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" value="<?php echo $row['uname'] ?>" id="user_name" class="form-control" name="user_name" readonly placeholder="Usernname">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" value="" id="ajax_username" class="form-control" name="ajax_username" placeholder="" readonly>
        <span class="fa fa-bell-o form-control-feedback"></span>
      </div>
 -->
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="text" value="<?php echo $row['upass'] ?>" id="user_pass" class="form-control" name="user_pass" " placeholder="Password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <label>Pick up</label>
       <div class="form-group has-feedback">
        <select id="pick_up" name="pick_up" class="form-control" style="width: 100%" required >                       
          <option value="">Pick Up Place</option>
          <option  <?php if( $row['pick_up']=='Tagum City' ) echo 'selected' ?> value="Tagum City">Tagum City</option>
          <option  <?php if( $row['pick_up']=='Davao City' ) echo 'selected' ?> value="Davao City">Davao City</option>
          <option  <?php if( $row['pick_up']=='Panabo City' ) echo 'selected' ?> value="Panabo City">Panabo City</option>
          <option  <?php if( $row['pick_up']=='Mati City' ) echo 'selected' ?> value="Mati City">Mati City</option>
          <option  <?php if( $row['pick_up']=='Butuan City' ) echo 'selected' ?> value="Butuan City">Butuan City</option>
          <option <?php if( $row['pick_up']=='Kapalong' ) echo 'selected' ?>  value="Kapalong">Kapalong</option> 
          <option  <?php if( $row['pick_up']=='Surigao City' ) echo 'selected' ?> value="Surigao City">Surigao City</option>
          <option <?php if( $row['pick_up']=='Nabunturan' ) echo 'selected' ?>  value="Nabunturan">Nabunturan</option>
          <option  <?php if( $row['pick_up']=='Manila' ) echo 'selected' ?> value="Manila">Manila</option>
          <option  <?php if( $row['pick_up']=='Caloocan' ) echo 'selected' ?> value="Caloocan">Caloocan</option>  
          <option  <?php if( $row['pick_up']=='Baculod' ) echo 'selected' ?> value="Baculod">Baculod</option>
          <option  <?php if( $row['pick_up']=='Sto.tomas' ) echo 'selected' ?> value="Sto.tomas">Sto.tomas</option>
          <option  <?php if( $row['pick_up']=='Digos City' ) echo 'selected' ?> value="Digos City">Digos City</option>                                                  
        </select>
      </div>


      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"name="update" class="update btn btn-primary btn-block btn-flat">Update</button>
        </div>
        <!-- /.col -->
      </div>
  <?php  } ?>
    </form>

<?php  
  if(isset($_POST['update'])){ 
    $fn = $_POST['first_name'];
    $mn = $_POST['mid_name'];
    $ln = $_POST['last_name'];
    $ad = $_POST['address1'];
    $stat = $_POST['stat'];
    $phone = $_POST['phone'];
    // $uname = $_POST['user_name'];
    $upass = $_POST['user_pass'];
    $pick_up = $_POST['pick_up'];

    $results = $conn->query("UPDATE member SET fn='$fn',mn='$mn',ln='$ln',ad='$ad',stat='$stat',phone='$phone' ,upass='$upass' ,pick_up='$pick_up' where uid =  '$getid'  ");

     
      echo "<script> window.location.href = 'member.php'; </script>";

  }
?>    
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

<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>


</body>
</html>
