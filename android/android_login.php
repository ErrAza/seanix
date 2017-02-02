<?php
require_once $_SERVER['DOCUMENT_ROOT']."/android/android_dbconnect.php";

$user_name = $_POST["login_name"];
$user_password = $_POST["login_pass"];

$sql_query = "SELECT name FROM user_info WHERE user_name LIKE '$user_name' AND user_pass LIKE '$user_password';";

$result = mysqli_query($conn, $sql_query);

if (mysqli_num_rows($result) > 0)
{
	$row = mysqli_fetch_assoc($result);
	$name = $row["name"];
	echo "Login Success... Welcome ".$name;
}
else
{
	echo "Login Failed...";
}

?>
