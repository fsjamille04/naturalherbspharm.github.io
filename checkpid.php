<?php

include("dbconnection.php"); 

$text1 = $_POST['text1'];
$text2 = $_POST['text2'];
$text3 = $_POST['text3'];





	$i=0;
	$x=1;
	$hid=$text1;


 if($hid==2){
 	die('invalid');
 }	

 $res = $conn->query("SELECT * FROM member WHERE uid = '".$hid."'");
 $num=$res->num_rows;

 

 if($num==0){
 	die('Not Register');
 }else{
 		// if ($hid==$text2){
 		// die('ok');
 		// }
	 while($x <= 1000000) {

	 				
				$sql="SELECT * FROM member WHERE uid = '".$hid."'";
				$result = mysqli_query($conn,$sql);
				
				while($row = mysqli_fetch_array($result)) {
         			$hid=$row['pid'];
         			$username=$row['uname'];
         			
                              if($hid==2){
                              		
                                 $x=1000000;
                                }
                                		if($hid==$text2){
             							$i+=1;
                                		$x=1000000;
                                		}
                                	       
				 }
	 	

	 	 $x++; 
	 }
	}

	if ($i>0){
		header('Content-Type', 'application/json');
		 mysqli_select_db($conn,"ajax_demo");
 		$sql="SELECT * FROM member WHERE uid = '".$text1."'";
 		$result = mysqli_query($conn,$sql);
 		while($row = mysqli_fetch_array($result)) {
     	echo  $row['uname'];
 			}

	}else{
		 if($text1==$text2){
		 	echo $text3;
		 }else{
		 	echo 'Invalid';
		 }
		
	}

 mysqli_close($conn);
?>
