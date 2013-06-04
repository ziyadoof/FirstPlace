<?php

// Index for Room Managment 

require('../model/mysql_connect.php');
require('../model/specialty_class.php');
require('../model/specialty_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_specialty_form';
}

//Get the available rooms then redirect to the add with list form.
if ($action == 'show_add_specialty_form') {             
    
	$specialty = SpecialtyDB::getSpecialties();				//variable will hold all the rooms
    include('add_specialty.php');

} else if ($action == 'add_specialty') {

        $sSD = isset($_REQUEST["spe_start_date"]) ? $_REQUEST["spe_start_date"] : "";
        $sED = isset($_REQUEST["spe_end_date"]) ? $_REQUEST["spe_end_date"] : "";
	
        $sType = $_POST['spesType_new'];
	$sName = $_POST['spesName_new'];

	// Validate the inputs
	if (empty($sType) || empty($sName) || empty($sSD) || empty($sED)) 
	{
		$error = "Invalid Speciality data. Check all fields and try again.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$SpesRow = new Specialty("", $sType, $sName , $sSD , $sED);
			
		//insert
		SpecialtyDB::addSpecialty($SpesRow);
		
		//redirect the user to the same page
		header("Location: .?action=show_add_specialty_form");
	}

} else if ($action == 'edit_specialty') {
	
	$s_id = $_POST['spes_id']; 
	$spesToBeEdited = SpecialtyDB::getSpecialty($s_id);
	include ('edit_specialty.php');
	
} else if ($action == 'update_specialty') {
	
        $s_sd = isset($_REQUEST["spe_start_date"]) ? $_REQUEST["spe_start_date"] : "";
        $s_ed = isset($_REQUEST["spe_end_date"]) ? $_REQUEST["spe_end_date"] : "";
    
	$sid = $_POST['s_id_to_edit'];
	$s_type = $_POST['sType_new'];
	$s_name = $_POST['sName_new'];
	//$s_sd = $_POST['sSD_new'];
	//$s_ed = $_POST['sED_new'];


	// Validate the inputs
	if (empty($sid) || empty($s_type) || empty($s_name) || empty($s_sd) || empty($s_ed)) 
	{
		$error = "Invalid specilty data. Check all fields and try again.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$SpesRow = new Specialty($sid, $s_type, $s_name, $s_sd, $s_ed);
			
		//update
		SpecialtyDB::updateSpecialty($SpesRow);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=show_add_specialty_form");
	}
	
}

?>