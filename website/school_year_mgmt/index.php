<?php

// index for School Year Managment 

require('../model/mysql_connect.php');
require('../model/schoolYear_class.php');
require('../model/schoolYear_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_schoolYear_form';
}

//Get the available rooms then redirect to the add with list form.
if ($action == 'show_add_schoolYear_form') {             
    
	$school_year = SchoolYearDB::getSchoolYears();	//variable will hold all the rows
    include('add_schoolyear.php');

} else if ($action == 'add_schoolyear') {
	
	$YstartDate = $_POST['startY_new'];
	$YendDate = $_POST['endY_new'];
	$yearName = $_POST['yearName_new'];


	// Validate the inputs
	if (empty($YstartDate) || empty($YendDate)) 
	{
		$error = "Invalid school year data. Check all fields and try again.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$SchoolYearRow = new SchoolYear("", $YstartDate, $YendDate);
		$SchoolYearRow->setName($yearName);
			
		//insert
		SchoolYearDB::addSchoolYear($SchoolYearRow);
		
		//redirect the user to the same page
		header("Location: .?action=show_add_schoolYear_form");
	}

} else if ($action == 'edit_schoolyear') {
	
	$sy_id = $_POST['schoolyear_id']; 
	$SY_ToBeEdited = SchoolYearDB::getSchoolYear($sy_id);
	include ('edit_schoolyear.php');
	
} else if ($action == 'update_schoolyear') {
	
	$syid = $_POST['SY_Edit_ID'];
	$sy_sd = $_POST['SY_SD_new'];
	$sy_ed = $_POST['SY_ED_new'];
	$sy_name = $_POST['SY_Name_new'];


	// Validate the inputs
	if (empty($syid) || empty($sy_sd) || empty($sy_ed)) 
	{
		$error = "Invalid school year data. Check all fields and try again.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$SY_row = new SchoolYear($syid, $sy_sd, $sy_ed);
		$SY_row->setName($sy_name);
			
		//update
		SchoolYearDB::updateSchoolYear($SY_row);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=show_add_schoolYear_form");
	}
	
}

?>