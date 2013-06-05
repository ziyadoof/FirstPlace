<?php

// Index for Attendence Type Managment 

require('../model/mysql_connect.php');
require('../model/attendanceType_class.php');
require('../model/attendanceType_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_att_type_form';
}

//Get the available rooms then redirect to the add with list form.
if ($action == 'show_add_att_type_form') {             
    
	$AttTypes = AttendanceTypeDB::getAttendanceTypes();	 //variable will hold all the attendeance types
    include('add_attendance_type.php');

} else if ($action == 'add_attType') {
	
	$attTypeName = $_POST['attTypeName_new'];
	
	$availableAttTypes = AttendanceTypeDB::getAttendanceTypes(); //variable will hold all the rooms
	$MatchAttType = 0;
	
	//Check if there is a match
	foreach ($availableAttTypes as $AvAttType) :
		if ($attTypeName == $AvAttType->getAttType_Name()) {
			$MatchAttType = 1;
		}
	endforeach;


	// Validate the inputs
	if (empty($attTypeName)) 
	{
		$error = "Invalid attendance type data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchAttType == 1){
		$error = "Attendence type name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$AttTypeRow = new AttendanceType("", $attTypeName);
			
		//insert
		AttendanceTypeDB::addAttendanceType($AttTypeRow);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=show_add_att_type_form");
	}

} else if ($action == 'edit_attType') {
	
	$attTypeID = $_POST['attType_id']; 
	$attTypeToBeEdited = AttendanceTypeDB::getAttendanceType($attTypeID);
	include ('edit_attendance_type.php');
	
} else if ($action == 'update_attType') {
	
	$attTypeID = $_POST['attType_id_cuurent'];
	$attTypeNewName = $_POST['AttType_New_Name'];

	$availableAttTypes = AttendanceTypeDB::getAttendanceTypes(); //variable will hold all the rooms
	$MatchAttType = 0;
	
	//Check if there is a match
	foreach ($availableAttTypes as $AvAttType) :
		if ($attTypeNewName == $AvAttType->getAttType_Name()) {
			$MatchAttType = 1;
		}
	endforeach;


	// Validate the inputs
	if (empty($attTypeID) || empty($attTypeNewName)) 
	{
		$error = "Invalid attendance type data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchAttType == 1){
		$error = "Attendence type name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$AttTypeRow = new AttendanceType($attTypeID, $attTypeNewName);
			
		//update
		AttendanceTypeDB::updateAttendanceType($AttTypeRow);
		
		header("Location: .?action=show_add_att_type_form");
	}
	
}
?>