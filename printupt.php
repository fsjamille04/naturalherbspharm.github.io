<?php
include("dbconnection.php"); 

$text1 = $_POST['text1'];



$results2 = $conn->query("UPDATE withdraw SET stat='done' where reg='$text1'");





?>