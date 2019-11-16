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
 
        <?php
          include 'header_nav.php'; 
        ?> 
      <div class="content-wrapper">  
        <section class="content"> 
          <div class="row">
            <div class="col-md-3">
                <label>Invoice Date From : </label>
                <input type='text' class="form-control datetimepicker1" id="datetimepicker1" />
                <input type="hidden" name="date1" id="newdate1">
            </div>
            <div class="col-md-3">
                <label> To :</label>
                <input type='text' class="form-control datetimepicker2" id="datetimepicker2" />
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
                                                <th>Sponsor</th>
                                                <th>Address</th>
                                                <th>Date</th>
                                                <th>Payout</th>
                                                <th>Have Payout</th>
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                        <?php 
                                          $sql="SELECT * FROM member ";
                                          $result = mysqli_query($conn,$sql);
                                          $num=0;
                                           while($row = mysqli_fetch_assoc($result)) {

                                            //in_array($row['uid'], $main['id']) 

                                              $time=strtotime($row['dat']);
                                              $month=date("F",$time);
                                                  $year=date("Y",$time);
                                                  $num++;   
                                          ?>
                                          <tr>
                                              <td><?php echo $row['uid']; ?></td> 
                                              <td><?php echo $row['fn'].' '.$row['mn'].' '.$row['ln']; ?></td> 
                                              <td><?php echo $row['sid']; ?></td> 
                                              <td><?php echo   $row['ad']; ?></td> 
                                              <td><?php echo $row['dat']; ?></td>
                                              <td>
                                                    <input type="hidden" value="<?php echo $row['uid']; ?>" name="payoutid" id="payoutid">
                                                    <input type="button" name="payoutlist" data-id="<?php echo $row['uid']; ?>" class="payoutlist md-trigger btn btn-primary mrg-b-lg" value="Payout">

                                                </td>
                                                <td>

                                                    <?php if(   in_array($row['uid'], str_replace(' ', '', $rebates))  ){ ?>
                                                        <label style="color: green;">
                                                            <p>Need to Payout</p>
                                                        </label>
                                                        <?php   }  ?>
                                                </td>
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

    <!-- Your Page Content Here -->

    <div class="modal fade hmodal-danger" id="myModal10" tabindex="-1" role="dialog" aria-hidden="true">
        <form method="post">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="color-line"></div>
                    <div class="modal-header">
                        <h4 class="modal-title">Security code</h4>

                    </div>
                    <div class="modal-body">

                        <div class="form-group col-lg-12">
                            <label>Amount</label>
                            <input type="text" placeholder="Enter Amount" required="" value="" name="amt" id="amt" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" name="save" id="save">Create</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        </section>
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </form>
    <!-- /.content-wrapper -->
    <div class="modal fade hmodal-danger" id="printSection" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header">

                </div>
                <!--  <form action="#" method="POST" role="form" >  -->
                <div class="modal-body" id="PrintModal">

                    <img src="images/loader.gif" id="loading-indicator" style="display:none; text-align: center;" />

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="payout_admin" id="payout_admin" onclick="printDiv()">Payout</button>

                </div>
                <!--  </form> -->
            </div>
        </div>

    </div>

    <div class="modal fade hmodal-danger" id="printAdminSection" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header">

                </div>
                <!--  <form action="#" method="POST" role="form" >  -->
                <div class="modal-body" id="printAdminSectionModal">

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
        $('#datetimepicker1').datepicker();
        $('#datetimepicker2').datepicker();
        function printDiv() {
            window.print();
        }
        window.onafterprint = function() {
            var first_stat = parseInt($('#first_stat').val());
            var userid = $('#idMember').attr('data-id');
            var date = $('#date').val();
            var fullname = $('#fullname').val();
            var lvl1_in = parseInt($('#lvl1_in').val());
            var lvl2_in = parseInt($('#lvl2_in').val());
            var lvl3_in = parseInt($('#lvl3_in').val());
            var lvl4_in = parseInt($('#lvl4_in').val());
            var lvl5_in = parseInt($('#lvl5_in').val());
            var mainpur = parseInt($('#mainpur').val());
            var lvl1 = parseInt($('#lvl1').val());
            var lvl2 = parseInt($('#lvl2').val());
            var lvl3 = parseInt($('#lvl3').val());
            var lvl4 = parseInt($('#lvl4').val());
            var lvl5 = parseInt($('#lvl5').val());
            var lvl6 = parseInt($('#lvl6').val());
            var lvl7 = parseInt($('#lvl7').val());
            var lvl8 = parseInt($('#lvl8').val());
            var lvl9 = parseInt($('#lvl9').val());

            var lvl1_in700 = parseInt($('#lvl1_in700').val());
            var lvl2_in700 = parseInt($('#lvl2_in700').val());
            var lvl3_in700 = parseInt($('#lvl3_in700').val());
            var lvl4_in700 = parseInt($('#lvl4_in700').val());
            var lvl5_in700 = parseInt($('#lvl5_in700').val());
            var mainpur700 = parseInt($('#mainpur700').val());
            var lvl1700 = parseInt($('#lvl1700').val());
            var lvl2700 = parseInt($('#lvl2700').val());
            var lvl3700 = parseInt($('#lvl3700').val());
            var lvl4700 = parseInt($('#lvl4700').val());
            var lvl5700 = parseInt($('#lvl5700').val());
            var lvl6700 = parseInt($('#lvl6700').val());
            var lvl7700 = parseInt($('#lvl7700').val());
            var lvl8700 = parseInt($('#lvl8700').val());
            var lvl9700 = parseInt($('#lvl9700').val());
            var total = parseFloat($('#total').val());

            $.ajax({
                type: 'POST',
                url: 'admin-payout-modal-admin.php',
                datatype: 'JSON',
                data: {
                    first_stat: first_stat,
                    userid: userid,
                    fullname: fullname,
                    lvl1_in: lvl1_in,
                    lvl2_in: lvl2_in,
                    lvl3_in: lvl3_in,
                    lvl4_in: lvl4_in,
                    lvl5_in: lvl5_in,
                    mainpur: mainpur,
                    lvl1: lvl1,
                    lvl2: lvl2,
                    lvl3: lvl3,
                    lvl4: lvl4,
                    lvl5: lvl5,
                    lvl6: lvl6,
                    lvl7: lvl7,
                    lvl8: lvl8,
                    lvl9: lvl9,

                    lvl1_in700: lvl1_in700,
                    lvl2_in700: lvl2_in700,
                    lvl3_in700: lvl3_in700,
                    lvl4_in700: lvl4_in700,
                    lvl5_in700: lvl5_in700,
                    mainpur700: mainpur700,
                    lvl1700: lvl1700,
                    lvl2700: lvl2700,
                    lvl3700: lvl3700,
                    lvl4700: lvl4700,
                    lvl5700: lvl5700,
                    lvl6700: lvl6700,
                    lvl7700: lvl7700,
                    lvl8700: lvl8700,
                    lvl9700: lvl9700,
                    total: total
                },

                success: function(data) {
                    console.log(data);
                    $('#printAdminSectionModal').html(data);
                    //location.reload();
                    alert(data);
                }
            });

        };
        $('#loading-indicator').show();
        jQuery(document).ready(function() {
 

            $('#PrintModal').html();
            $('#datetimepicker1').change(function() {
                var date1 = $('#datetimepicker1').val();
                $('#newdate1').val(date1);
            })
            $('#datetimepicker2').change(function() {
                var date2 = $('#datetimepicker2').val();
                $('#newdate2').val(date2);
            });

            $('.payoutlist').click(function() {
                $('#PrintModal').append();
                var date1 = $('#newdate1').val();
                var date2 = $('#newdate2').val();
                var userid = $(this).attr('data-id');
                $('#loading-indicator').show();
                $('#printSection').modal('show');

                $.ajax({
                    type: 'POST',
                    datatype: 'JSON',
                    url: 'admin-payout-func.php',
                    data: {
                        userid: userid,
                        date1: date1,
                        date2: date2,
                    },
                    datatype: 'text',
                    success: function(data) {
                        $('#loading-indicator').hide();
                        $('#PrintModal').html(data);

                    }
                });

            });

        });
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
            $('#example2').dataTable({

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

        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('#save').click(function() {
                var id = $("#amt").val();
                if (id == '') {
                    swal("Opps!", id + " Please enter amount!", "warning")
                } else {
                    //swal("Good job!",id + " Code Created!", "success")

                    $.ajax({
                        type: "POST",
                        async: "false",
                        url: "savecode.php",
                        data: {
                            text1: id
                        },
                        success: function(html) {

                            if (html) {
                                var res = html;

                                location.reload();
                            } else {
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
        $(function() {
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