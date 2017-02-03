<?php 

$db_name = "android";
$mysql_user = "root";
$mysql_pass = "3m0ti0N_;/9000";
$server_name = "localhost";

$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);

$query = "SELECT * FROM android_versions;";

  $result = mysqli_query($conn,$query);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  echo json_encode($rows);

  mysqli_close($conn);
?>
