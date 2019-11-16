<?php
include("dbconnection.php"); 



$text1 = $_POST['text1'];

if ($result = $conn->query("SELECT * FROM member WHERE uname = '".$text1."'")) {
          if($result->num_rows ==0){
          echo "Username Available";
          }else{
          	echo "Username Not Available!";
          }

        $result->close();    
    }

mysqli_close($conn);
?>