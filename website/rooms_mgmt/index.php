<?php
require('../model/mysql_connect.php');
require('../model/room_class.php');
require('../model/room_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_room_form';
}

//Get the available rooms then redirect to the add with list form.
if ($action == 'show_add_room_form') {             
    
	$rooms = RoomDB::getRooms();				//variable will hold all the rooms
    include('add_room.php');

} else if ($action == 'add_room') {
	
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
	}
		
	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=show_add_room_form");
} else if ($action == 'edit_employee') {
	
	$rooms = RoomDB::getRooms();
	$empIdToEdit = $_POST['employee_id']; 	
	$employee = EmployeeDB::getEmployee($empIdToEdit);

	include ('edit_employee.php');
	
} else if ($action == 'delete_employee') {
	
	$empIdToDelete = $_POST['employee_id']; 
	
	$DelEmployee = EmployeeDB::getEmployee($empIdToDelete);
	$ToBeDeletedEmpID = $DelEmployee->getEmployeeID();
	
	if ($DelEmployee->getEmployeeType() == 't'){
		TeacherRoleDB::deleteTeachByEmployee($ToBeDeletedEmpID);
		EmployeeDB::deleteEmployee($ToBeDeletedEmpID);
	}elseif ($DelEmployee->getEmployeeType() == 'a'){
		AdminRoleDB::deleteAdminRoleByEmpID($ToBeDeletedEmpID);
		EmployeeDB::deleteEmployee($ToBeDeletedEmpID);	
	} elseif ($DelEmployee->getEmployeeType() == 'c'){
		CaseRoleDB::deleteCaseWorkerByEmpID($ToBeDeletedEmpID);
		EmployeeDB::deleteEmployee($ToBeDeletedEmpID);	
	} else {
		$error = "Invalid product data. Check all fields and try again.";
		include('../errors/error.php');	
	}

	header("Location: .?action=show_add_employee_form");
	
} else if ($action == 'update_employee') {
	
	$firstname = $_POST['firstName_cuurent'];
	$lastname = $_POST['lastName_cuurent'];
	$phonenumber = $_POST['phoneNumber_cuurent'];
	$address = $_POST['address_cuurent'];
	$email_address = $_POST['email_cuurent'];
	$classroom = $_POST['classRoom_cuurent'];
	$roleID = $_POST['roleID_cuurent'];
	$eID = $_POST['empID_cuurent']; 
	
	if (empty($firstname) || empty($lastname) || empty($email_address) || empty($eID)) 
	{
		$error = "Invalid product data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$employeeNew = new Employee($firstname, $lastname, $email_address, $username, $password, $classroom);
		$employeeNew->setEmployeeID($eID);
		$employeeNew->setRoom($classroom);
		$employeeNew->setEmployeeType($roleID);
		$employeeNew->setPhoneNum($phonenumber);
		$employeeNew->setAddress($address);
		
		//updated
		EmployeeDB::updateEmployee($employeeNew); //big employee role problem!
	}
	//go back to show the employee
	header("Location: .?action=show_add_employee_form");
}

?>