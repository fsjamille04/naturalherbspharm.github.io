<?php
include ('dbconnection.php');

if (isset($_GET['printid'])) {
       $code= $_GET['printid'];

        $code = preg_replace('/[^A-Za-z0-9]/','',$code);

      
    }else{

    
    }

 



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Print DIV Content using javaScript</title>
    <script language="javascript" type="text/javascript">
        function PrintDivContent(divId) {
            var printContent = document.getElementById(divId);
            var WinPrint = window.open('', '', 'left=5,top=1,toolbar=0,sta­tus=0');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
        }
    </script>








    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="vendor/fooTable/css/footable.core.min.css" />

    <link rel="stylesheet" href="vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="vendor/select2-bootstrap/select2-bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="styles/style.css">

<script type='text/javascript' src='vendor/jquery.js'></script>




</head>
<body>
    <form id="form1" runat="server">
    <div>   
      <br>

  <input type="hidden"name="cod"id="cod"value="<?php echo $code; ?>">    
 <div class="col-lg-2"></div><div class="col-lg-2"> <button type="button"name="save"id="save" onclick="javascript:PrintDivContent('divToPrint');"  class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Payout</button>
  <asp:ImageButton ID="imgBtnPrint" runat="server" ImageUrl="~/Print_button.png" OnClientClick="javascript:PrintDivContent('divToPrint');" /></div><br>

    <div id="divToPrint"style="width:8.5in; height: 6in; margin: auto;">
   

   	<?php
   		global $code;

  $sql2 = "SELECT * FROM withdraw WHERE reg = '$code'";
  $result2=$conn->query($sql2);

  while($row2=$result2->fetch_assoc()) {
  	$amt = $row2['withdraw'];
  	$dat = $row2['dat'];

    $id= $row2['id']; 
  
     
  } 		
   		


  $sql = "SELECT * FROM member WHERE uid = '$id'";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
	$uname=$row['uname'];
	$fn=$row['fn'].' '.$row['mn'].' '.$row['ln'] ;
	$ad=$row['ad'];
	
	  
  }
  echo'<br>';


  echo '<center><h1>COMPANY NAME</h2>
    <h3>Tagum City</h2>
    </center><br>'; 
  echo '<table style="width: 100%;table-layout:fixed;">';
  echo '<tr><td width="20%">USERNAME</td><td><td><td>'.$uname.'</td></tr>';
  echo '<tr><td width="15%">FULLNAME</td><td><td><td colspan="2">'.$fn.'</td></tr>';  
  echo '<tr><td width="15%">ADDRESS</td><td><td><td colspan="2">'.$ad.'</td></tr>';
  echo '<tr><td width="15%">DATE</td><td><td><td colspan="2">'.$dat.'</td></tr>';
  
  echo '<td><br><br></td>';
  echo '<tr><td width="15%"></td><td></td><td><td><td align="right"><td align="left"></tr>';
  echo '<tr><td width="15%"></td><td></td></tr>';
  echo '<tr><td width="15%"></td><td></td></tr>';

  echo '<tr><td colspan="5"><br><hr></td></tr>';

  echo '<tr><td><br>'.'RECIEVED BY'.'</td><td><br><hr></td></tr>';
  echo '<tr><td><br>'.'PREPARED BY '.'</td><td><br><hr></td></tr>';
  echo '<tr><td><br>'.'DATE RECIEVED '.'</td><td><br><hr></td></tr>';



  echo '</table>';  	       
   	?>
   		
    </div>
   

    <br />
    
     
    <asp:ImageButton ID="imgBtnPrint" runat="server" ImageUrl="~/Print_button.png" OnClientClick="javascript:PrintDivContent('divToPrint');" />
    </div>
    </form>
</body>
</html>

<script>


  jQuery(document).ready(function($){
     $('#save').click(function(){
    
    var id=$("#cod").val();
    
        $.ajax({        
          type: "POST",
          async: "false",
          url: "printupt.php",
          data: { text1: id },
          success: function(html) {
          if(html)
            { 
              var val= html;
                                
                
            }
           else
           {
            return false; 
           }
         }
       });

     });
   });

</script>