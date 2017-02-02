<?php
$con=mysqli_connect("localhost","root","3m0ti0N_;/9000","fullstacktest");

$sql = "select * from names";
$result = mysqli_query($con, $sql);
$rows = array();

while($r = mysqli_fetch_assoc($result)){
	$rows[] = $r;
}

echo json_encode($rows);

mysqli_close($con);
?>
