<?php
include("dbconnection.php"); 

$text1 = $_POST['text1'];


				$sql="SELECT * FROM member WHERE uname = '".$text1."'";
				$result = mysqli_query($conn,$sql);
				
				while($row = mysqli_fetch_array($result)) {

				echo $row['uid'];
				}	


mysqli_close($conn);
?>