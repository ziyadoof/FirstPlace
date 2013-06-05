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
require('../model/class_class.php');
require('../model/class_db.php');
require('../model/student_class.php');
require('../model/student_db.php');
require('../model/studentHasClass_class.php');
require('../model/studentHasClass_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_class_form';
}

if ($action == 'show_add_class_form') {             
	$stdClasses = StdClassDB::getStdClasses();
	$rooms = RoomDB::getRooms();
	$terms = SchoolYearDB::getSchoolYears();
	$employees = EmployeeDB::getTeachers();
	$classes = ClassDB::getClasses();
	
    include('add_class.php');
} else if ($action == 'add_class') {
	
	$stdClass = $_POST['stdClass_new'];
	$room = $_POST['classroom_new'];
	$term = $_POST['term_new'];
	$employee = $_POST['teacher_new'];

	// Validate the inputs
	if (empty($stdClass) || empty($room) || empty($term)|| empty($employee)) 
	{
		$error = "Invalid class data. Check all fields and try again.";
		include('../errors/error.php');
	} else 
	{
		// //insert into class
		$classRow = new ClassFP($stdClass, 
								$room, 
								$term, 
								$employee);
								
		ClassDB::addClass($classRow);
	}
		
	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=show_add_class_form");
} else if ($action == 'edit_class') {

	if (isset($_POST['class_id'])) {
		$classIdToEdit = $_POST['class_id'];
	} else {
		$classIdToEdit = $_GET['class_id'];
	}

	$classToEdit = ClassDB::getClassById($classIdToEdit);
	
	$stdClasses = StdClassDB::getStdClasses();
	$rooms = RoomDB::getRooms();
	$terms = SchoolYearDB::getSchoolYears();
	$employees = EmployeeDB::getTeachers();
	$classes = ClassDB::getClasses();
	
	$studentsNotInClass = StudentDB::getStudentsNotInClass($classIdToEdit);
	$studentsInClass = StudentDB::getStudentsByClassId($classIdToEdit);
	
	$error = $classToEdit->getStdC_id();

	include('edit_class.php');
} else if ($action == 'update_class') {

	$stdClass = $_POST['stdClass_update'];
	$room = $_POST['classroom_update'];
	$term = $_POST['term_update'];
	$employee = $_POST['teacher_update'];
	$classId = $_POST['classId'];

	// Validate the inputs
	if (empty($stdClass) || empty($room) || empty($term)|| empty($employee)) 
	{
		$error = "Invalid class data. Check all fields and try again.";
		include('../errors/error.php');
	} else  {
		// //insert into class
		$classRow = new ClassFP($stdClass, 
								$room, 
								$term, 
								$employee);
		$classRow->setC_id($classId);
		
		ClassDB::updateClass($classRow);
	}
		
	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=show_add_class_form");
} else if ($action == 'add_student_to_class') {

	$classId = $_POST['classId_edit'];
	$studentId = $_POST['studentId_add'];
	
	StudentHasClassDB::addStudentToClass($studentId, $classId);
	
	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=edit_class&class_id=".$classId);
} else if ($action == 'remove_student_from_class') {

	$classId = $_POST['classId_edit'];
	$studentId = $_POST['studentId_remove'];
		
	StudentHasClassDB::removeStudentFromClass($studentId, $classId);

	//redirect hte user to the same page where he can see the employee list and refrech the add fields
	header("Location: .?action=edit_class&class_id=".$classId);
}

?>