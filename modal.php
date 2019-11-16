

   

<?php

include("dbconnection.php"); 

$text1 = $_POST['text1'];



$sql = "SELECT * FROM product where reg= $text1";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  
     echo $row['pn'];
}



?>
