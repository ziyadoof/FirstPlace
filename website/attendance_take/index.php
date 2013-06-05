<?php

//Employee Managment indes file

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
    $AvailableClasses = ClassInfoDB::getClassesByYear($TodayDate);	//variable will hold all the rooms
    include('select_class.php');
	
} else if ($action == 'take_attendance_for_class') {
	
	if (isset($_POST['ClassID'])) {
		$class_id_selected = $_POST['ClassID'];
	} else {
		$class_id_selected = $_GET['ClassID'];
	}

	$class_selected = ClassDB::getClassById($class_id_selected);
	$studentsInClass = StudentDB::getStudentsByClassId($class_id_selected);
	$AttTypes = AttendanceTypeDB::getAttendanceTypes();
	$ClassInfo = ClassInfoDB::getClassByID($class_id_selected);

	include('take_attendance.php');
	
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
	
} else if ($action == 'edit_employee') {

	if (isset($_POST['employee_id'])) {
		$empIdToEdit = $_POST['employee_id'];
	} else {
		$empIdToEdit = $_GET['employee_id'];
	}
	
	$rooms = RoomDB::getRooms();
	$roles = RoleDB::getRoles();
	//$empIdToEdit = $_POST['employee_id']; 	
	$employee = EmployeeDB::getEmployee($empIdToEdit);
	$EmpSpecialtis = SpecialtyDB::getSpecialtiesForEmp($empIdToEdit); //Get specilaties for the specified employee
	$NotEmpSpecialties = SpecialtyDB::getSpecialtiesNotForEmp($empIdToEdit); //Get all specialties

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
	
	
} else if ($action == 'add_spes_to_emp') {   //Add Speciality to Employee
	
	$specID = $_POST['spes_id'];
	$EmpID = $_POST['employee_id'];
	
	if (empty($specID) || empty($EmpID)) 
	{
		$error = "Oops..., Something went wrong! Please try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$EmpSpesLink = new EmployeeHasSpecialty($EmpID, $specID);
		
		//updated
		EmployeeHasSpecialtyDB::addSpecialtyToEmployee($EmpSpesLink); //big employee role problem!
	}
	//go back to show the employee
	header("Location: .?action=edit_employee&employee_id=".$EmpID);
	
	
} else if ($action == 'drop_spes_from_emp') {   //Remove Speciality from Employee
	
	$specID = $_POST['spes_id'];
	$EmpID = $_POST['employee_id'];
	
	if (empty($specID) || empty($EmpID)) 
	{
		$error = "Oops..., Something went wrong! Please try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$EmpSpesLink = new EmployeeHasSpecialty($EmpID, $specID);
		
		//updated
		EmployeeHasSpecialtyDB::deleteSpecialtyFromEmployee($EmpSpesLink); //big employee role problem!
	}
	//go back to show the employee
	header("Location: .?action=edit_employee&employee_id=".$EmpID);
}
?>