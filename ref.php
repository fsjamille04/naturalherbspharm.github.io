<?php
include("dbconnection.php"); 

$text1 = $_POST['text1'];

				$res="Not register please check!";

				$sql="SELECT * FROM member WHERE uid = '".$text1."'";
				$result = mysqli_query($conn,$sql);
				
				while($row = mysqli_fetch_array($result)) {

				$res = $row['fn'] .' '. $row['mn'] .' '. $row['ln'] ;
				}	
				echo $res;

mysqli_close($conn);
?>