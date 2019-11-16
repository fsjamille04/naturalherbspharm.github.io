<?php
include ('dbconnection.php');
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT * FROM product WHERE pn LIKE '%".$searchTerm."%' ORDER BY pn ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['pn'];
}
//return json data
echo json_encode($data);
?>


