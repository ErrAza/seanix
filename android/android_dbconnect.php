<?php

$db_name = "android";
$mysql_user = "root";
$mysql_pass = "3m0ti0N_;/9000";
$server_name = "localhost";

$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);

if (!$conn)
{
	echo "Failed to connect...".mysqli_connect_error();
}
else
{
	echo "<h3>DB Connection Success...</h3>";
}

?>

