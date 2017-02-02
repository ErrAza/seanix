<?php
require "android_test.php";

$name = $_POST["user"];
$user_name = $_POST["user_name"];
$user_password = $_POST["user_pass"];

$sql_query = "INSERT into user_info VALUES('$name', '$user_name', '$user_password');";

if (mysqli_query($conn, $sql_query))
{
	//echo "<h3> Data Insertion Success...</h3>";
}
else
{
	//echo "Data Insertion Error...".mysqli_error($conn);
}

?>
