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
	
	$rName = $_POST['roomName_new'];
	
	$availableRooms = RoomDB::getRooms();//variable will hold all the rooms
	$MatchRoom = 0;
	
	//Check if there is a match
	foreach ($availableRooms as $AvRoom) :
		if ($rName == $AvRoom->getLocation()) {
			$MatchRoom = 1;
		}
	endforeach;


	// Validate the inputs
	if (empty($rName)) 
	{
		$error = "Invalid room data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchRoom == 1){
		$error = "Room name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$RoomRow = new Room("", $rName);
			
		//insert
		RoomDB::addRoom($RoomRow);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=show_add_room_form");
	}

} else if ($action == 'edit_attType') {
	
	$r_id = $_POST['room_id']; 
	$roomToBeEdited = RoomDB::getRoom($r_id);
	include ('edit_room.php');
	
} else if ($action == 'update_room') {
	
	$r_id = $_POST['r_id_cuurent'];
	$r_location = $_POST['LocName_New'];

	$availableRooms = RoomDB::getRooms();//variable will hold all the rooms
	$MatchRoom = 0;
	
	//Check if there is a match
	foreach ($availableRooms as $AvRoom) :
		if ($r_location == $AvRoom->getLocation()) {
			$MatchRoom = 1;
		}
	endforeach;

	// Validate the inputs
	if (empty($r_location)) 
	{
		$error = "Invalid room data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchRoom == 1){
		$error = "Room name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$RoomRow = new Room($r_id, $r_location);
			
		//update
		RoomDB::updateRoom($RoomRow);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=show_add_room_form");
	}
	
}
?>