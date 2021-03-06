<?php

// Index for Standard Class Managment 

require('../model/mysql_connect.php');
require('../model/stdClass_class.php');
require('../model/stdClass_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_standardClass_form';
}

//Get the available standard classes then redirect to the add with list form.
if ($action == 'show_add_standardClass_form') {             
    
	$stdClasses = StdClassDB::getStdClasses();		//variable will hold all the standard classes
	
    include('add_standardClass.php');

} else if ($action == 'add_standardClass') {
	
	$stdClassName = $_POST['stdClassName_new'];
	
	$availablestdClasses = StdClassDB::getStdClasses();//variable will hold all the standard classes
	$MatchstdClass = 0;
	
	//Check if there is a match
	foreach ($availablestdClasses as $availablestdClass) :
	if ($stdClassName == $availablestdClass->getClassName()) {
		$MatchstdClass = 1;
	}
	endforeach;

	// Validate the inputs
	if (empty($stdClassName)) 
	{
		$error = "Invalid stdClass data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchstdClass == 1){
		$error = "stdClass name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$stdClassRow = new StdClass2("", $stdClassName);
			
		//insert
		StdClassDB::addStdClass($stdClassRow);
		
		//redirect the user to the same page where he can see the stdClasses list and refresh the add fields
		header("Location: .?action=show_add_standardClass_form");
	}
} else if ($action == 'edit_standardClass') {

	$stdClass_id = $_POST['stdClass_id']; 
	$stdClassToBeEdited = StdClassDB::getStdClassById($stdClass_id);
	include ('edit_standardClass.php');	
} else if ($action == 'update_standardClass') {

	$stdClass_id = $_POST['stdClass_id'];
	$stdClass_Name = $_POST['stdClass_Name'];

	$allStandardClasses = StdClassDB::getStdClasses();//variable will hold all the roles
	$MatchStdClass = 0;
	
	//Check if there is a match
	foreach ($allStandardClasses as $currStdClass) :
		if ($stdClass_Name == $currStdClass->getClassName()) {
			$MatchStdClass = 1;
		}
	endforeach;

	// Validate the inputs
	if (empty($stdClass_Name)) 
	{
		$error = "Invalid standard class data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchStdClass == 1){
		$error = "Standard class name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$stdClassRow = new StdClass2($stdClass_id, $stdClass_Name);
			
		//update
		StdClassDB::updateStdClass($stdClassRow);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=show_add_standardClass_form");
	}
}



?>