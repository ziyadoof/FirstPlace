<?php

// index for School Year Managment 

require('../model/mysql_connect.php');
require('../model/logs_class.php');
require('../model/logs_db.php');
require('../model/logType_class.php');
require('../model/logType_db.php');
require('../model/attendanceType_class.php');
require('../model/attendanceType_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_logs_form';
}

//Get the available rooms then redirect to the add with list form.
if ($action == 'show_logs_form') {             
    
	$logs = LogsDB::getLogs();	//variable will hold all the rows
        $attenTys = AttendanceTypeDB::getAttendanceTypes();
       
        include('view_logs.php');

}


?>