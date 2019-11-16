<?php
session_start();
include("dbconnection.php"); 
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Natural Herbs Pharm</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
<img src="dist/img/logo11.png">
    <a href="">Natural Herbs Pharm Inc.</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post"> 
    <div class="form-group has-feedback">
        <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Username" title="Please enter you username" required="" value="" name="username1" id="username" class="form-control">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
         
        </div> 
        <!-- /.col -->
       
        <div class="col-xs-4">
        
 <button type="submit" class="btn btn-primary btn-block btn-flat"name="contact_submit">Sign In</button> 
    
        </div>
	 <!-- <div class ="col-md-12">TO ALL MEGA CENTERS,  MOBILE CENTERS AND DEALERS, WE WOULD LIKE TO INFORM YOU  ALL , THAT OUR ENCODING WILL BE DONE BY ADMIN DEPARTMENT FOR THE MARITIME, BECAUSE  THE I.T. ARE DONG SOME UPGRADE  FOR OUR SYSTEM TO BE MORE EFFICIENT AND DYNAMIC PAY OUT , WE SORRY FOR THE INCONVENIENT,  WE WILL INFORM YOU ALL AS SOON AS POSSIBLE WHENEVER THE UPGRADING SYSTEM WILL BE DONE.</div> -->





         <div style="color : red;">

                <?php
                              
                              if (isset($_POST['contact_submit'])) {
                             

                             $uname = $_POST['username1']; 
                               $pass = $_POST['password'];

                              
                              if ($result = $conn->query("SELECT * FROM member where uname='$uname' and upass='$pass'")) {
                              if($result->num_rows !=0){
                              $mres = mysqli_fetch_assoc($result);                            
                                echo "<script> window.location.href = 'dashboard.php'; </script>";                                                       

                              $_SESSION['pdid'] = $mres['uid'];
                              }else{
                               echo "Invalid Username or Password!";
                              }
                              $result->close();    
                              }   
                              
        
                              }

                        ?>
                    </div>





        <!-- /.col -->
       </div>
    </form> 


    
    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
            <div style="text-align: center; margin-top: 1px;">
            
            <p>Click here: <a href="http://naturalherbspharm.com">Back to main page</a></p>

            <div style="text-align: center; margin-top: 160px;">
            All rights reserved.<br/><strong>Copyright &copy; 2017 <a href="#">NaturalHerbsPharm Corp</a>.</strong> 
            <div style="margin-top: 2px;"> 
            </div>
          </div>


</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>

</html>
