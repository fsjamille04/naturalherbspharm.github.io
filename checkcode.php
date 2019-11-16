<?php
include("dbconnection.php"); 

$text1 = $_POST['text1'];
$text2 = $_POST['text2'];

//echo $text1;

if ($result = $conn->query("SELECT * FROM tbpin WHERE id = '".$text1."' and pin ='".$text2."'")) {
          if($result->num_rows ==0){
          echo 'Invalid UserID';
          }else{
           echo 'Correct'; 
          }
        $result->close();    
    }
mysqli_close($conn);
?>