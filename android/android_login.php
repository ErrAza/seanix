<?php
require_once $_SERVER['DOCUMENT_ROOT']."/android/android_dbconnect.php";

$user_name = $_POST["login_name"];
$user_password = $_POST["login_pass"];
$user_salt = $_POST["login_salt"];

if ($user_salt == "")
{
	// If no salt is provided on login, we need to fetch it to compare. (This is to accomodate a 2ndary request to the same script)
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
		echo "No matching salt query found for ".$user_name;
	}
}
else
{
	// Salt was provided, let us now compare the hashed passwords
	$getuser_query = "SELECT name FROM user_info WHERE user_pass LIKE '$user_password';";

	$result = mysqli_query($conn, $getuser_query);

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$user_name = $row["user_name"];

		if ($salt == $row["salt"])
		{
			echo "Login successful for: ".$user_name;
		}
		else
		{
			echo "Passwords match, but salt does not!";
		}
	}
	else
	{
		echo "No matching pw query found for ".$user_name;
	}
}



?>
