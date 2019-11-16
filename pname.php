<?php
include("dbconnection.php"); 

$text1 = $_POST['text1'];
	
				$name="Not registered";

				$sql="SELECT * FROM member WHERE uname = '".$text1."'";
				$result = mysqli_query($conn,$sql);
				
				while($row = mysqli_fetch_array($result)) {

				$name = $row['fn'] .' '. $row['mn'] .' '.$row['ln'];
				}
				echo $name;

mysqli_close($conn);
?>
