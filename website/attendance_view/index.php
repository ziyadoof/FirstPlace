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
require('../model/student_class.php');
require('../model/student_db.php');
require('../model/student_classes_info_class.php');

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
} else if ($action == 'by_student') {
	
	$students = StudentDB::getStudents();	//variable will hold all the students
	
	include('select_student_attendance.php');
	
	
}  else if ($action == 'selected_student') {
	
	
	$selected_student_id = $_POST['student_id'];

	$StudentClasses = ClassInfoDB::getClassesForStudent($selected_student_id);
	
	include('classes_for_student.php');
} else if ($action == 'view_attendenc_for_std_in_class') {
	
	
	$selected_std_id = $_POST['student_id'];
	$selected_class_id = $_POST['class_id'];
	$selected_start = $_POST['req_start_date'];
	$selected_end = $_POST['req_end_date'];

	$attendacneRecords = AttendanceDB::getAttendanceFullInfoByClassAndDay($selected_class_id, $selected_std_id, $selected_start, $selected_end);//Get Attendance info
	
	include('view_attendance_for_student.php');
}
?>