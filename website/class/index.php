<?php
require('../model/mysql_connect.php');
require('../model/room_class.php');
require('../model/room_db.php');
require('../model/stdClass_class.php');
require('../model/stdClass_db.php');
require('../model/schoolYear_class.php');
require('../model/schoolYear_db.php');
require('../model/employee_class.php');
require('../model/employee_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_class_form';
}

if ($action == 'show_add_class_form') {             
	$stdClasses = StdClassDB::getStdClass();
	$rooms = RoomDB::getRooms();
	$terms = SchoolYearDB::getSchoolYears();
	$employees = EmployeeDB::getTeachers();
	
    // $rooms = RoomDB::getRooms();				//variable will hold all the rooms
	// $grades = StdClassDB::getStdClass();
	// $terms = SchoolYearDB::getSchoolYear();
	// $teachers = TeacherRoleDB::getTeachers();
	
	
    include('add_class.php');
} else if ($action == 'add_class') {
	
	// $grade = $_POST['grade_new'];
	// $classroom = $_POST['classroom_new'];
	// $term = $_POST['term_new'];
	// $teacher = $_POST['teacher_new'];

	// // Validate the inputs
	// // if (empty($firstname) || empty($lastname) || empty($email_address)|| empty($username) || empty($password)) 
	// // {
		// // $error = "Invalid product data. Check all fields and try again.";
		// // include('../errors/error.php');
	// // } else 
	// {
		// //insert into class
		// $classRow = new ClassFP($grade, $classroom, $term);			
		// ClassDB::addClass($classRow);		
	// }
		
	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=show_add_class_form");
}

?>