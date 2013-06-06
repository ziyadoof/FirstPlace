<?php

//View Attendance Managment index file

require('../model/mysql_connect.php');
require('../model/class_Info_class.php');
require('../model/class_Info_db.php');
require('../model/class_class.php');
require('../model/class_db.php');
require('../model/attendanceType_class.php');
require('../model/attendanceType_db.php');
require('../model/attendance_class.php');
require('../model/attendance_db.php');
require('../model/holiday_class.php');
require('../model/holiday_db.php');
require('../model/attendance_info.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'select_attendance';
}

//Get the available rooms for adding new employee.
if ($action == 'select_attendance') {  

	$TodayDate = date("Y-m-d");
    $AvailableClasses = ClassInfoDB::getClassesByYear($TodayDate);	//variable will hold class info
	//Get the holidays for this year to disable them.
	
    include('select_attendance.php');
	
} else if ($action == 'view_attendance') {
	
	$selected_class_id = $_POST['ClassID'];
	$date_selected = $_POST['selected_date'];

	$ClassRow = ClassInfoDB::getClassByID($selected_class_id);
	$attendacneRecords = AttendanceDB::getAttendanceFullInfoByClassAndDay($selected_class_id,$date_selected);//Get Attendance info
	
	include('view_attendance.php');
	
} else if ($action == 'apply_attendace') {

	$NumberOfRows = $_POST['rows_count'];
	
	$attend = array();
	
	for ($i=0; $i<$NumberOfRows ; $i++){
		$attendanceRow = new AttendanceTable($_POST['studentId_add_'.$i],
									$_POST['classId_add_'.$i],
									$_POST['attendanceType_id_'.$i],
									date("Y-m-d"));
		$attendanceRow->setAttComment($_POST['attendance_comment_'.$i]);
		
		$attend[] = $attendanceRow;
	}
	
	AttendanceDB::addManyAttendance($attend);
	
	$msg = "Attendance was successfully taken.";
	include('messages.php');
}
?>