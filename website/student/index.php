<?php
require('../model/mysql_connect.php');
require('../model/student_class.php');
require('../model/student_db.php');
require('../model/employee_class.php');
require('../model/employee_db.php');



if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_student_form';
}

//Get the available rooms for adding new student.
if ($action == 'show_add_student_form') {             
	$students = StudentDB::getStudents();	//variable will hold all the students
    $caseworks = EmployeeDB::getCaseWorkers();	//variable will hold all the Student has class
        
    include('add_student.php');
} else if ($action == 'add_student') {
	
	$firstname = $_POST['firstName_new'];
	$lastname = $_POST['lastName_new'];
	$phonenumber = $_POST['phoneNumber_new'];
	$address = $_POST['address_new'];
	$email_address = $_POST['email_new'];
	$grade = $_POST['grade_new'];
	$casework = $_POST['casework_new'];
	$year = $_POST['year_new'];

	// Validate the inputs
	if (empty($firstname) || empty($lastname) || empty($phonenumber)|| empty($address)) 
	{
		$error = "Invalid product data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
		$studentRow = new Student($firstname, $lastname, $address, $phonenumber);
		$studentRow->setEmail($email_address);
                $studentRow->setGrade($grade);
		$studentRow->setCaseWorker($casework);
		$studentRow->setStartDate($year);
			
		//insert
		StudentDB::addStudent($studentRow); //DB trigger will take care of the adding the rmployee to the approbiate role.
	}
		
	//redirect hte user to the same page where he can see the student list and refrech the add fields
	header("Location: .?action=show_add_student_form");
} else if ($action == 'edit_student') {

    $stIdToEdit = $_POST['student_id'];
	if (empty($stIdToEdit)) 
	{
		$error = "Invalid employee data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{ 	
	$studentEdit = StudentDB::getStudent($stIdToEdit);
    $caseworks = EmployeeDB::getCaseWorkers();	//variable will hold all the Student has class

	include ('edit_student.php');
	}
	
} else if ($action == 'update_student') {
	
	$firstname = $_POST['firstName_cuurent'];
	$lastname = $_POST['lastName_cuurent'];
	$phonenumber = $_POST['phoneNumber_cuurent'];
	$address = $_POST['address_cuurent'];
	$email_address = $_POST['email_cuurent'];
	$grade = $_POST['grade_cuurent'];
	$casework = $_POST['casework_cuurent'];
	$year = $_POST['year_cuurent'];
	$sID = $_POST['stID_cuurent']; 
	
        // Validate the inputs
	if (empty($firstname) || empty($lastname) || empty($phonenumber)|| empty($address)) 
	{
		$error = "Invalid product data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		//Set vlaues
                $studentNew = new Student($firstname, $lastname, $address, $phonenumber);
		$studentNew->setGrade($grade);
		$studentNew->setEmail($email_address);
                $studentNew->setCaseWorker($casework);
		$studentNew->setStartDate($year);
                $studentNew->setStudentID($sID);

		
		//updated
		StudentDB::updateStudent($studentNew); 
	}
	//go back to show the student
	header("Location: .?action=show_add_student_form");
}


?>