<?php

// Index for Role Managment 

require('../model/mysql_connect.php');
require('../model/role_class.php');
require('../model/role_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_role_form';
}

//Get the available rooms then redirect to the add with list form.
if ($action == 'show_add_role_form') {             
    
	$roles = RoleDB::getRoles();		//variable will hold all the roles
    include('add_role.php');

} else if ($action == 'add_role') {
	
	$rName = $_POST['roleName_new'];
	
	$availableRoles = RoleDB::getRoles();//variable will hold all the rooms
	$MatchRole = 0;
	
	//Check if there is a match
	foreach ($availableRoles as $AvRole) :
		if ($rName == $AvRole->getRoleName()) {
			$MatchRole = 1;
		}
	endforeach;


	// Validate the inputs
	if (empty($rName)) 
	{
		$error = "Invalid role data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchRole == 1){
		$error = "Role name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$RoleRow = new Role("", $rName);
			
		//insert
		RoleDB::addRole($RoleRow);
		
		//redirect the user to the same page where he can see the roles list and refrech the add fields
		header("Location: .?action=show_add_role_form");
	}

} else if ($action == 'edit_room') {
	
	$r_id = $_POST['role_id']; 
	$roleToBeEdited = RoleDB::getRole($r_id);
	include ('edit_role.php');
	
} else if ($action == 'update_role') {
	
	$r_id = $_POST['r_id_cuurent'];
	$r_name = $_POST['roleName_New'];

	$availableRoles = RoleDB::getRoles();//variable will hold all the roles
	$MatchRole = 0;
	
	//Check if there is a match
	foreach ($availableRoles as $AvRole) :
		if ($r_name == $AvRole->getRoleName()) {
			$MatchRole = 1;
		}
	endforeach;

	// Validate the inputs
	if (empty($r_name)) 
	{
		$error = "Invalid role data. Check all fields and try again.";
		include('../errors/error.php');
	} elseif ($MatchRole == 1){
		$error = "Role name already exists. Try another name.";
		include('../errors/error.php');
	}else {
		//Set vlaues
		$RoleRow = new Role($r_id, $r_name);
			
		//update
		RoleDB::updateRole($RoleRow);
		
		//redirect hte user to the same page where he can see the employee list and refrech the add fields
		header("Location: .?action=show_add_role_form");
	}
	
}

?>