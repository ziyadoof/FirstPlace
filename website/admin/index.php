<?php
require('../model/mysql_connect.php');
require('../model/employee_class.php');
require('../model/employee_db.php');
require('../model/room_class.php');
require('../model/room_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'fff';
}

//Get the available rooms for adding new employee.
if ($action == 'show_add_employee_form') {             
    $rooms = RoomDB::getRooms();				//variable will hold all the rooms
	$employees = EmployeeDB::getEmployees();	//variable will hold all the employees
    include('add_employee.php');
} else if ($action == 'add_employee') {
	
	$firstname = $_POST['firstName_new'];
	$lastname = $_POST['lastName_new'];
	$phonenumber = $_POST['phoneNumber_new'];
	$address = $_POST['address_new'];
	$email_address = $_POST['email_new'];
	$classroom = $_POST['classRoom_new'];
	$username = $_POST['username_new'];
	$password = $_POST['password_new'];
	$roleID = $_POST['roleID_new'];

	// Validate the inputs
	if (empty($firstname) || empty($lastname) || empty($email_address)|| empty($username) || empty($password)) 
	{
		$error = "Invalid product data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$employeeRow = new Employee($firstname, $lastname, $email_address, $username, $password, $classroom);
		$employeeRow->setRoom($classroom);
		$employeeRow->setEmployeeType($roleID);
		$employeeRow->setPhoneNum($phonenumber);
		$employeeRow->setAddress($address);
			
		//insert
		EmployeeDB::addEmployee($employeeRow); //DB trigger will take care of the adding the rmployee to the approbiate role.
	}
		
	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=show_add_employee_form");
} else if ($action == 'edit_employee') {
	
	$empIdToEdit = $_POST['employee_id']; 
	echo $empIdToEdit;

	include ('edit_employee.php');
}


?>