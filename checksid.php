<?php

include("dbconnection.php"); 

$text1 = $_POST['text1'];



if ($result = $conn->query("SELECT * FROM member where uid='$text1'")) {
          if($result->num_rows !=0){
            $row = mysqli_fetch_assoc($result);
          
            echo $row['uname'];
            
                 
     		$result->close();    
    }else{

  
    		echo 'This is invalid userid or username';
    }
  } 

?>
