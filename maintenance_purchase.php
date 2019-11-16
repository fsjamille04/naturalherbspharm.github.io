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
        Re-purchase Products 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
 
    <section class="content"> 
		<div class="row">
		  	<div class="box">
            	<div class="box-header">
        			<div class="box-body"> 
		            	<div class="register-box"> 
					  	<div class="register-box-body">
					    	<p class="login-box-msg">Purchase</p> 
    						<form method="post" class="submitForm">
						      	<div class="form-group has-feedback">
						         	<input type="number"required="" value="" name="userid" id="userid" class="form-control"placeholder="UserID" required  > 
						      	</div> 
						      	<div class="form-group has-feedback">
						         	<input type="text"required="" value="" name="fullname" id="fullname"placeholder="Customer's name" class="form-control"readonly required> 
						      	</div> 
						      	<?php 
							      	$query = "SELECT * FROM `product`";
	       						 	$result = mysqli_query ($conn, $query);
	       						 	 
						      	?>
						      	<div class="form-group">
							      	<select class="form-control choose_prod" required>
							      		<option>Select Product</option>
							      		<?php 
							      		while ($row = mysqli_fetch_assoc($result)) { ?>
		       						 		<option data-id = "<?php echo $row['reg'] ; ?>" value="<?php echo $row['dis'] ; ?>" data-id="<?php  echo $row['dis'] ; ?>"><?php echo $row['pn'] ; ?></option> 
		       						 	<?php }
							      		?>  
							      	</select>	
						      	</div>
						      	
						      	<div class="form-group has-feedback">
							        <input type="number"required="" value="" name="qty" id="qty" class="form-control" required placeholder="Quantity" autocomplete="off">
						       	</div>
						      	<div class="form-group has-feedback">
							        <input type="text" placeholder="SRP" required="" value="" name="srp" id="srp" required class="form-control"readonly> 
						      	</div>
						      	<div class="form-group has-feedback">
							        <input type="text" placeholder="Amount" required="" value="" name="amt" id="amt" class="form-control"readonly required>  
						      	</div> 
						      	<div class="form-group"> 
				                    <input type="text" autocomplete="off" id="date" placeholder="Date" class="form-control datepicker" required>  
				              	</div> 
						     	<div class="row"> 
							        <div class="col-xs-4">
							          <button type="submit"name="submits" class="btn btn-primary btn-block btn-purchase">Purchase</button>
							        </div> 
						      	</div> 
                              
							</form> 
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

jQuery(document).ready(function($){
   	$('#userid').change(function(){
   		var id = $(this).val();
   		$.ajax({
   			url: "function.php",
   			type: "POST",
   			data:{
   				action: "check_sponsor",
   				id: id
   			},
   			success:function(data){ 
  				if(data != 'fail'){
			        var data = JSON.parse(data);
			        $('#fullname').attr('data-id','1'); 
			        $('#fullname').attr('placeholder', data.fullname);
			        $('#fullname').css('border', '2px solid green');
			        $('#fullname').css('border-radius', '2px');

			      }else{
			        $('#fullname').attr('placeholder','No User found');
			        $('#fullname').attr('data-id','0'); 
			        $('#fullname').css('border', '2px solid red');
			        $('#fullname').css('border-radius', '2px');
			      }
   			}
   		});
   	});

   	$('.choose_prod').change(function(){
   		var prod = $(this).data('id') ;
   		// var qnty = $(this).find(':selected').data('id');
   		$('#srp').val($(this).val());
   		$('#amt').val($('#srp').val() * $('#qty').val()) ;
   	})
 	$('#qty').keyup(function(){
   		$('#amt').val($('#srp').val() * $('#qty').val()) ;
   	})


 	$('.submitForm').submit(function(){
 		var id = $('#userid').val();
 		var dataid = $('#fullname').attr('data-id'); 
 		var prod = $('.choose_prod').find(':selected').data('id')
 		var qty = $('#qty').val();
 		var amt = $('#amt').val();
 		var date = $('#date').val(); 
 		var prodprice = $('.choose_prod').val(); 
 		// alert(dataid);
 		if(  dataid == 1  ){
 			$.ajax({
				url: "function.php",
				type: "POST",
				data:{
					action: "add_purchase",
					id: id,
					prod: prod,
					qty: qty,
					amt: amt, 
					date: date, 
					prodprice: prodprice, 
				},
				success:function(data){
					alert(data); 
				}
			});
 		}else{
 			event.preventDefault();
 			alert('Please input all fields');
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
<script>
$('.datepicker').datepicker();
</script>
</body>
</html>
