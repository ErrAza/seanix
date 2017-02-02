<?php
require_once $_SERVER['DOCUMENT_ROOT']."/android/android_dbconnect.php";

$name = $_POST["user"];
$user_name = $_POST["user_name"];
$user_password = $_POST["user_pass"];
$user_salt = $_POST["salt"];

$sql_query = "INSERT into user_info VALUES('$name', '$user_name', '$user_password', '$user_salt');";

if (mysqli_query($conn, $sql_query))
{
	echo "User successfully registered...";
}
else
{
	echo "Data Insertion Error...".mysqli_error($conn);
}

?>
