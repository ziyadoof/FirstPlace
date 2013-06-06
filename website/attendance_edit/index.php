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
	$AttTypes = AttendanceTypeDB::getAttendanceTypes();
	
	include('view_attendance.php');
	
} else if ($action == 'update_attendance') {

	$std_id = $_POST['student_id'];
	$cls_id = $_POST['class_id'];
	$att_id = $_POST['attendace_id'];
	$att_date = $_POST['attDate'];
	$att_coment = $_POST['att_comment'];
	
	if (empty($std_id) || empty($cls_id) || empty($att_id) || empty($att_date)) 
	{
		$error = "Oops... something went wrong.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$AttNewRow = new AttendanceTable($std_id, $cls_id, $att_id, $att_date);
		$AttNewRow->setAttComment($att_coment);
		
		//updated
		AttendanceDB::updateAttendance($AttNewRow);
		
		header("Location: .?action=after_update&ClassID=".$cls_id."&selected_date=".$att_date);
	}
	
} else if ($action == 'after_update') {

	$selected_class_id = $_GET['ClassID'];
	$date_selected = $_GET['selected_date'];

	$ClassRow = ClassInfoDB::getClassByID($selected_class_id);
	$attendacneRecords = AttendanceDB::getAttendanceFullInfoByClassAndDay($selected_class_id,$date_selected);//Get Attendance info
	
	include('view_attendance_after_update.php');
}
?>