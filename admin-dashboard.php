<?php
include ('dbconnection.php'); 
session_start();
$id = $_SESSION['pdid2'];
if(!isset($_SESSION['pdid2']) || (trim($_SESSION['pdid2']) == '')) {
   	header("location: login1.php");
  	exit();
}
 
$idr=0;

$sql = "SELECT count(uid) as tot FROM member";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  $totmem = $row['tot'];

  }

  $sql = "SELECT count(id) as tot FROM withdraw where stat=''";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  $totpay = $row['tot'];

  }

$sql = "SELECT count(id) as tot FROM withdraw where stat='done'";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  $paydone = $row['tot'];

  }

  $di = $totmem * 1000;  

	$sql = "SELECT sum(withdraw) as tot FROM withdraw where stat='done'";
  	$result=$conn->query($sql);

  	while($row=$result->fetch_assoc()) {
	  	$pout = $row['tot']; 
  	}           

?>



        <?php
			include 'header_nav.php'; 
		?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1> Admin Dashboard  </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $totmem;  ?></h3>

                                    <p>Total Members</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $totpay;  ?></h3>

                                    <p>Payable Withdrawal</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-hand-o-up"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow" data-toggle="modal" data-target="#myModal12">
                                <div class="inner">
                                    <h3><?php echo $paydone;  ?></h3>

                                    <p>Paid Withdrawal</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-thumbs-o-up"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo '₱' . number_format($di,2,'.',','); ?></h3> 
                                    <p>Total Income</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div> 
                        </div>

                        <!-- Your Page Content Here -->

                        <div class="col-lg-12">

                            <div class="box">
                                <div class="box-header">
                                    <div class="box-body">
                                        <div class="hpanel">

                                            <div class="panel-body list">

                                                <h3 class="no-margins font-extra-bold text-success"> PRODUCTS</h3>
                                                <br>

                                                <small class="fo">Product Sold</small>

                                                <small class="fo pull-right">Product Stock</small>

                                                <table id="example2" class="footable table table-stripped toggle-arrow-tiny" data-page-size="8" data-filter=#filter>

                                                    <tbody>
                                                        <?php

									                  	$sql="SELECT  product.pn,sum(prodqty.qty) as tot,product.reg FROM product join prodqty on prodqty.pid=product.reg  group by prodqty.pid";

									                  	//$sql="SELECT * FROM product";
									                  	$result = mysqli_query($conn,$sql);
									                  	$num=0;
									                   	while($row = mysqli_fetch_array($result)) {?>

	                                                    <div class="list-item-container">
	                                                        <div class="list-item"> 
	                                                            <tr>
	                                                                <td>
	                                                                    <h3 class="no-margins font-extra-bold text-success">
										                                 <?php
										                                 $hpid = $row['reg'];
										                                 $sql2="SELECT  sum(purchase.qty) FROM purchase where purchase.pid='$hpid'";
										                                    $result2 = mysqli_query($conn,$sql2);
										                                    while($row2 = mysqli_fetch_array($result2)) {
 																				$napalit = $row2['0'];
										                                        if( $napalit ==""){ $napalit =  '0'; }
									                                          	echo $napalit;  
									                                      	}  ?></h3> 
                                                                        <label>
                                                                            <?php echo $row['0']; ?> 
                                                                        </label>
                                                                        <div class="pull-right font-bold">
                                                                            <a data-toggle="modal" data-userid="<?php echo $row['reg']; ?>" href="#qw" class="btn btn-s btn-default">
                                                                            <?php 
												                                echo $row['1'] - $napalit; 
											                              	?>
                                                                            </a><i class="fa fa-level-up text-success"></i>
                                                                        </div>
                                                            		</td>	
                                                            	</tr>
                                                            
                                                            </div>
                                                        </div>
                                                        <?php } ?> 
                                                    </tbody>
                                                    <tfoot> 
                                                        <tr>
                                                            <td colspan=""><ul class="pagination pull-right"></ul> </td>
                                                        </tr>	 
                                                    </tfoot> 
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="box-body">
                                        <div class="panel-body">
                                            <h4 class="no-margins font-extra-bold text-danger">LIST OF PAYOUTS</h4>
                                            <br>
                                            <table id="example1" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Number</th>
                                                        <th>Username</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Pick-up Check</th> 
                                                    </tr>
                                                </thead> 
                                                <tbody> 
                                                    <?php
                                                    $sql="SELECT withdraw.withdraw,member.fn,member.mn,member.ln,withdraw.dat,withdraw.reg,member.ad FROM withdraw join member on withdraw.id=member.uid where withdraw.stat='done'";
                                                    $result = mysqli_query($conn,$sql);
                                                    $num=0;
                                                    while($row = mysqli_fetch_array($result)) {
                                                        $num++; ?>
                                                    <tr>
                                                        <td><?php echo $num; ?></td> 
                                                        <td><?php echo $row['fn'].' '.$row['mn'].' '.$row['ln']; ?></td> 
                                                        <td><?php echo $row['0']; ?></td> 
                                                        <td><?php echo   $row['dat']; ?></td> 
                                                        <td><?php echo $row['ad']; ?></td>
                                                    </tr>            
                                                    <?php } ?> 
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td><strong></strong></td> 
                                                        <td></td>
                                                        <td>
                                                            <strong><h2 class='no-margins font-extra-bold text-danger'>Total of Widraws ₱ <?php echo number_format($pout,2,'.',',') ?><strong> 
                                                        </td>
                                                        <td></td> 
                                                    </tr>
                                                </tfoot>

                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>    
                                 
                    </section>
                <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <div class="modal fade" id="qw" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title"><div id="mres"> </div></h4>
                                <small class="font-bold"></small>
                            </div>
                            <form method="POST">

                                <div class="modal-body">
                                    <p>
                                        <center><strong>Quantity</strong></center>

                                        <br>
                                        <input id="demo5" type="text" onkeypress="return isIDNumber(event)" name="demo5" value="0">
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addprod" id="addprod">Save</button>
                                    <input type="hidden" id="passid" name="passid">
                                </div> 
                                <?php
                                    if (isset($_POST['addprod'])) {                                              
                                        $passer = $_POST['passid'];
                                        $hqty = $_POST['demo5']; 
                                        $sql = $conn->query("INSERT IGNORE INTO prodqty (pid,qty) VALUES ('$passer','$hqty')");  
                                        echo "<script> window.location.href = 'admin-dashboard.php'; </script>";      
                                    }    
                                ?> 
                            </form>
                        </div>
                    </div>
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
                    $.widget.bridge('uibutton', $.ui.button);

                    jQuery(document).ready(function($) {

                        $('#qw').on('show.bs.modal', function(e) {

                            var userid = $(e.relatedTarget).data('userid');

                            $.ajax({
                                type: "POST",
                                async: "false",
                                url: "modal.php",
                                data: {
                                    text1: userid
                                },
                                success: function(html) {
                                    if (html) {
                                        var val = html;
                                        $('#passid').val(userid);
                                        $('#mres').html(val);
                                    } else {
                                        return false;
                                    }
                                }
                            });
                        });
                    });
                </script>

                <script>
                    $(function() {

                        $('#example1').dataTable({

                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            "lengthMenu": [
                                [10, 25, 50, -1],
                                [10, 25, 50, "All"]
                            ],
                            buttons: [{
                                extend: 'copy',
                                className: 'btn-sm'
                            }, {
                                extend: 'csv',
                                title: 'ExampleFile',
                                className: 'btn-sm'
                            }, {
                                extend: 'pdf',
                                title: 'ExampleFile',
                                className: 'btn-sm'
                            }, {
                                extend: 'print',
                                className: 'btn-sm'
                            }]
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

</body>

</html>