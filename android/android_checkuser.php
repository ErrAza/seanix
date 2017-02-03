<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/android/android_dbconnect.php";

$user_name = $_POST["login_name"];

	$getuser_query = "SELECT name FROM user_info WHERE user_name LIKE '$user_name';";

	$result = mysqli_query($conn, $getuser_query);

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$salt = $row["salt"];
		echo $salt;
	}
	else
	{
		echo "USER INFO NOT FOUND";
	}

 ?>