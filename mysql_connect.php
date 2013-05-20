<?php

$db_host = "localhost";
$db_username = "root";
$db_pass = "root123"; //yout own password
$db_name = "firstplace";

@mysql_connect ("$db_host","$db_username","$db_pass") or die ("Could not Connect to MySQL");
@mysql_select_db ("$db_name") or die ("No database");



//$sql = mysql_query ("SELECT * FROM `table`);

?>