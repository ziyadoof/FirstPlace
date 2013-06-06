<?php

//Take Attendance Managment indes file

require('../model/mysql_connect.php');
require('../model/class_Info_class.php');
require('../model/class_Info_db.php');
require('../model/class_class.php');
require('../model/class_db.php');
require('../model/student_class.php');
require('../model/student_db.php');
require('../model/studentHasClass_class.php');
require('../model/studentHasClass_db.php');
require('../model/attendanceType_class.php');
require('../model/attendanceType_db.php');
require('../model/attendance_class.php');
require('../model/attendance_db.php');
require('../model/holiday_class.php');
require('../model/holiday_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'take_attendance';
}

//Get the available rooms for adding new employee.
if ($action == 'take_attendance') {  

	$TodayDate = date("Y-m-d");
    $AvailableClasses = ClassInfoDB::getClassesByYear($TodayDate);	//variable will hold class info
	
    include('select_class.php');
	
} else if ($action == 'take_attendance_for_class') {
	
	if (isset($_POST['ClassID'])) {
		$class_id_selected = $_POST['ClassID'];
	} else {
		$class_id_selected = $_GET['ClassID'];
	}
	
	$TodayDate = date("Y-m-d");
	$attendacneRecords = AttendanceDB::getAttendanceByClassAndDay($class_id_selected,$TodayDate);//Check if attendence already taken
	
	$availableDate = 0;
	foreach($attendacneRecords as $attRow){
	
		$std_id = $attRow->getAtt_student_id();   //this is a variable of AttendanceTable Type
		$class_id = $attRow->getAtt_class_id();
		$attType_id = $attRow->getAtt_type_id();
		$attDate = $attRow->getAtt_date();
		$attCommentValue = $attRow->getAttComment();
		
		$availableDate = $attDate;
	}
	
	$class_selected = ClassDB::getClassById($class_id_selected);
	$studentsInClass = StudentDB::getStudentsByClassId($class_id_selected);
	$AttTypes = AttendanceTypeDB::getAttendanceTypes();
	$ClassInfo = ClassInfoDB::getClassByID($class_id_selected);
	
	$SchoolYearID = $class_selected->getSchoolYear_id();
	$isHlidayToday = HolidayDB::getHolidaysBysYearID_and_Date($SchoolYearID, $TodayDate);
	
	$isHolSD = $isHlidayToday->getStartDate();
	$isHolED = $isHlidayToday->getEndDate();
	$isHolName = $isHlidayToday->getName();
	
	if ($TodayDate = $availableDate) 
	{
		$msg = "Attendance is already taken for this class today. Please contact your admin for editing.";
		include('messages.php');
	} elseif ($isHolSD != NULL) {
		$msg = "Today is a holiday(".$isHolSD." - ".$isHolED."), you can't take attendance for today.";
		include('messages.php');
	
	}else
	{
		include('take_attendance.php');
	}
	
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