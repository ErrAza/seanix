<?php
require_once $_SERVER['DOCUMENT_ROOT']."/android/android_dbconnect.php";

$name = $_POST["user"];
$user_name = $_POST["user_name"];
$user_password = $_POST["user_pass"];
$user_salt = $_POST["salt"];

$sql_checkuserexists_query = "SELECT name FROM user_info WHERE user_name LIKE '$user_name';";

$checkresult = mysqli_query($conn, $sql_checkuserexists_query);

	if (mysqli_num_rows($checkresult) > 0)
	{
		$row = mysqli_fetch_assoc($checkresult);
		$user = $row["user_name"];
		if ($user_name == $user)
		{
			echo "USER ALREADY EXISTS: ".$user_name;
		}
		else
		{
			echo "Internal Error!";
		}
	}
	else
	{
		$sql_query = "INSERT into user_info VALUES('$name', '$user_name', '$user_password', '$user_salt');";

		if (mysqli_query($conn, $sql_query))
		{
			echo "SUCCESS";
		}
		else
		{
			echo "Data Insertion Error...".mysqli_error($conn);
		}
	}




?>
