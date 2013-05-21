<?php

$db_host = "localhost";
$db_username = "root";
$db_pass = "root123"; //yout own password
$db_name = "firstplace";

@mysql_connect ("$db_host","$db_username","$db_pass") or die ("Could not Connect to MySQL");
@mysql_select_db ("$db_name") or die ("No database");


// This select statment shouldn't be here, I just was testing it. It should be in a diffrent .php file
$sql = mysql_query ("SELECT * FROM `employee`");

while ($row = mysql_fetch_array ($sql)){

	$emp_id = $row["emp_id"];
	$FirstName = $row["FirstName"];
	$LastName = $row["LastName"];
	$PhoneNumber = $row["PhoneNumber"];
	$Address = $row["Address"];
	$email_Address = $row["email_Address"];
	$classroom = $row["classroom"];
	$password = $row["password"];
	$username = $row["username"];
	
	echo $emp_id . ", " . $FirstName . ", " . $LastName . ", " . $PhoneNumber . ", " . $Address . ", " . $email_Address . ", " . $classroom . ", " . $password . ", " . $username . "<br>";
	
	};
?>