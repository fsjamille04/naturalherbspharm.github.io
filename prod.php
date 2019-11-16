<?php
include("dbconnection.php"); 

$text1 = $_POST['text1'];


				$sql="SELECT * FROM product WHERE pn = '".$text1."'";
				$result = mysqli_query($conn,$sql);
				
				while($row = mysqli_fetch_array($result)) {

				echo $row['dis'];
				}	


mysqli_close($conn);
?>