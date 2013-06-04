<?php
require('../model/mysql_connect.php');
require('../model/employee_class.php');
require('../model/employee_db.php');
require('../model/room_class.php');
require('../model/room_db.php');
require('../model/role_class.php');
require('../model/role_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_employee_form';
}

//Get the available rooms for adding new employee.
if ($action == 'show_add_employee_form') {             
    $rooms = RoomDB::getRooms();				//variable will hold all the rooms
	$roles = RoleDB::getRoles();
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
	if (empty($firstname) || empty($lastname) || empty($email_address)|| empty($username) || empty($password) || empty($roleID)) 
	{
		$error = "Invalid employee data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$employeeRow = new Employee($firstname, $lastname, $email_address, $username, $password, $classroom);
		$employeeRow->setRoom($classroom);
		$employeeRow->setRoleID($roleID);
		$employeeRow->setPhoneNum($phonenumber);
		$employeeRow->setAddress($address);
			
		//insert
		EmployeeDB::addEmployee($employeeRow); //DB trigger will take care of the adding the rmployee to the approbiate role.
	}
		
	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=show_add_employee_form");
} else if ($action == 'edit_employee') {
	
	$rooms = RoomDB::getRooms();
	$roles = RoleDB::getRoles();
	$empIdToEdit = $_POST['employee_id']; 	
	$employee = EmployeeDB::getEmployee($empIdToEdit);

	include ('edit_employee.php');
	
} else if ($action == 'delete_employee') {
	
	$empIdToDelete = $_POST['employee_id']; 
	
	$DelEmployee = EmployeeDB::getEmployee($empIdToDelete);
	$ToBeDeletedEmpID = $DelEmployee->getEmployeeID();
	
	if (empty($ToBeDeletedEmpID)) 
	{
		$error = "Invalid employee data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		EmployeeDB::deleteEmployee($ToBeDeletedEmpID);
		header("Location: .?action=show_add_employee_form");
	}		
	
} else if ($action == 'update_employee') {
	
	$firstname = $_POST['firstName_cuurent'];
	$lastname = $_POST['lastName_cuurent'];
	$phonenumber = $_POST['phoneNumber_cuurent'];
	$address = $_POST['address_cuurent'];
	$email_address = $_POST['email_cuurent'];
	$classroom = $_POST['classRoom_cuurent'];
	$roleID = $_POST['New_RoleID'];
	$eID = $_POST['empID_cuurent']; 
	
	if (empty($firstname) || empty($lastname) || empty($email_address) || empty($eID) || empty($roleID)) 
	{
		$error = "Invalid employee data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$employeeNew = new Employee($firstname, $lastname, $email_address, $username, $password, $classroom);
		$employeeNew->setEmployeeID($eID);
		$employeeNew->setRoleID($roleID);
		$employeeNew->setPhoneNum($phonenumber);
		$employeeNew->setAddress($address);
		
		//updated
		EmployeeDB::updateEmployee($employeeNew); //big employee role problem!
	}
	//go back to show the employee
	header("Location: .?action=show_add_employee_form");
}


?>