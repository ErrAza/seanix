<?php
require_once $_SERVER['DOCUMENT_ROOT']."/android/android_dbconnect.php";

$user_name = $_POST["login_name"];
$user_password = $_POST["login_pass"];
$user_salt = $_POST["login_salt"];

	// Salt was provided, let us now compare the hashed passwords
	$getuser_query = "SELECT name FROM user_info WHERE user_pass LIKE '$user_password';";

	$result = mysqli_query($conn, $getuser_query);

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);

		if ($user_name == $row["user_name"])
		{
			if ($salt == $row["salt"])
			{
				echo "SUCCESS";
			}
			else
			{
				echo "Passwords match, but salt does not!";
			}
		}
		else
		{
			echo "Usernames do not match!"
		}
	}
	else
	{
		echo "No User Exists for: ".$user_name;
	}

?>
