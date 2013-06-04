<?php

// index for School Year Managment 

require('../model/mysql_connect.php');
require('../model/schoolYear_class.php');
require('../model/schoolYear_db.php');
require('../model/holiday_class.php');
require('../model/holiday_db.php');

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

	if (isset($_POST['schoolyear_id'])) {
		$sy_id = $_POST['schoolyear_id'];
	} else {
		$sy_id = $_GET['schoolyear_id'];
	}
	 
	$SY_ToBeEdited = SchoolYearDB::getSchoolYear($sy_id);
	$YearHolidays = HolidayDB::getHolidaysBysYear($sy_id);
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
	
} else if ($action == 'delete_holiday_from_year') {
	
	$DeleteThisID = $_POST['hli_id_to_delete'];
	$E_SY_IS = $_POST['edited_SY_id'];
	// Validate the inputs
	if (empty($DeleteThisID)) 
	{
		$error = "Oops..., Something went wrong! Please try again.";
		include('../errors/error.php');
	}else {
		//Set vlaues

		HolidayDB::deleteHoliday($DeleteThisID);
		
		//redirect hte user to the same page
		header("Location: .?action=edit_schoolyear&schoolyear_id=".$E_SY_IS);
	}
	
} else if ($action == 'add_holiday_to_year') {
	
	$Hli_SD = $_POST['new_holiday_sd'];
	$Holi_ED = $_POST['new_holiday_ed'];
	$Holi_Name = $_POST['new_holiday_name'];
	$Scl_Year_ID = $_POST['AddTo_schoolyear_id'];


	// Validate the inputs
	if (empty($Hli_SD) || empty($Holi_ED) || empty($Scl_Year_ID)) 
	{
		$error = "Oops..., Something went wrong! Please try again.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$HlidayRow = new Holiday("",$Scl_Year_ID, $Hli_SD, $Holi_ED);
		$HlidayRow->setName($Holi_Name);
			
		//insert
		HolidayDB::addHoliday($HlidayRow);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=edit_schoolyear&schoolyear_id=".$Scl_Year_ID);
	}
	
}

?>