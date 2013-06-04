<?php
class EmployeeDB {
    public static function getEmployees() {
		$db = Database::getDB();
        
		$query = 'select * from employeelistwithroomandrole_view order by RoleName'; //This is a view
		
		//Get the results into array
		$result = $db->query($query);
		$employees = array();
		foreach ($result as $row) {
            $employee = new Employee($row['FirstName'],
									$row['LastName'],
									$row['email_Address'],
									$row['username'],
									$row['password'],
									$row['Room_Room_ID']);
			$employee->setPhoneNum($row['PhoneNumber']);
			$employee->setEmployeeID($row['emp_id']);
			$employee->setAddress($row['Address']);
			$employee->setRoomNmae($row['Location']);
			$employee->setRoleID($row['Role_Role_ID']);
			$employee->setRoleName($row['RoleName']);
			
            $employees[] = $employee;
        }
		
		return $employees;
    }
    
    public static function getEmployee($e_id) {

		$db = Database::getDB();
        
		$query = "SELECT * FROM employeelistwithroomandrole_view
                  WHERE emp_id = '$e_id'";
        $result = $db->query($query);
        $row = $result->fetch();
        
            $employee = new Employee($row['FirstName'],
									$row['LastName'],
									$row['email_Address'],
									$row['username'],
									$row['password'],
									$row['Room_Room_ID']);
			$employee->setPhoneNum($row['PhoneNumber']);
			$employee->setEmployeeID($row['emp_id']);
			$employee->setAddress($row['Address']);
			$employee->setRoomNmae($row['Location']);
			$employee->setRoleID($row['Role_Role_ID']);
			$employee->setRoleName($row['RoleName']);
		
		return $employee;
    }

    public static function addEmployee($employee) {
        $db = Database::getDB();
		
		$classroom = $employee->getRoom();
		$firstname = $employee->getFirstName();
		$lastname = $employee->getLastName();
		$phoneNum = $employee->getPhoneNum();
		$address = $employee->getAddress();
		$email_address = $employee->getEmail();
		$username = $employee->getUserName();
		$password = $employee->getPassword();
		$empRoleID = $employee->getRoleID();
		
		$WithRoomQuery =
			"INSERT INTO employee
				(Room_Room_ID, FirstName, LastName, PhoneNumber, Address, email_Address, password, username, Role_Role_ID)
			VALUES
				('$classroom', '$firstname', '$lastname', '$phoneNum', '$address', '$email_address', '$password', '$username', '$empRoleID')";

		$WithoutRoomQuery =
			"INSERT INTO employee
				(FirstName, LastName, PhoneNumber, Address, email_Address, password, username, Role_Role_ID)
			VALUES
				('$firstname', '$lastname', '$phoneNum', '$address', '$email_address', '$password', '$username', '$empRoleID')";
		
		//Check if the room was specified by the user or not
		if ($classroom == "NotSpecified")
		{
			$row_count = $db->exec($WithoutRoomQuery);
		} else 
		{
			$row_count = $db->exec($WithRoomQuery);
		}
        return $row_count;
    }

	public static function updateEmployee($employee) {
		$db = Database::getDB();
		
		$e_id = $employee->getEmployeeID();
		$classroom = $employee->getRoom();
		$firstname = $employee->getFirstName();
		$lastname = $employee->getLastName();
		$phoneNum = $employee->getPhoneNum();
		$address = $employee->getAddress();
		$emailAddress = $employee->getEmail();
		$username = $employee->getUserName();
		$password = $employee->getPassword();
		$empType = $employee->getRoleID();		
		
		$queryWithRoomSpecified = 
				"UPDATE employee
				SET emp_id = emp_id ,
					Room_Room_ID = '$classroom' ,
					FirstName = '$firstname' ,
					LastName =  '$lastname',
					PhoneNumber = '$phoneNum' ,
					Address = '$address' ,
					email_Address = '$emailAddress',
					Role_Role_ID = '$empType'
				WHERE emp_id = '$e_id'";
				
		$queryWithRoomNotSpecified = 
				"UPDATE employee
				SET emp_id = emp_id ,
					Room_Room_ID = NULL ,
					FirstName = '$firstname' ,
					LastName =  '$lastname',
					PhoneNumber = '$phoneNum' ,
					Address = '$address' ,
					email_Address = '$emailAddress',
					Role_Role_ID = '$empType'
				WHERE emp_id = '$e_id'";
		
		if ($classroom == "NotSpecified")
		{
			$row_count = $db->exec($queryWithRoomNotSpecified);
		} else 
		{
			$row_count = $db->exec($queryWithRoomSpecified);
		}
		
		return $row_count;
	}
	
	public static function deleteEmployee($employeeID) {
	   $db = Database::getDB();
	   
	   $query = "DELETE FROM employee WHERE emp_id = '$employeeID' ";
	   
	   $row_count = $db->exec($query);
	   return $row_count;
	}

    public static function getCaseWorkers() {
		$db = Database::getDB();
        
		$query = 'select * from ViewCaseWorkers'; //This is a view
		
		
		$result = $db->query($query);
		$caseworkers = array();
		foreach ($result as $row) {
                $caseworker = new Employee($row['firstname'],
									$row['lastname'],
									$row['email_address'],
									$row['username'],
									$row['password'],
									$row['room_room_id']);
									
			$caseworker->setEmployeeID($row['emp_id']);
			// $employee->setPhoneNum($row['PhoneNumber']);
			// $employee->setAddress($row['Address']);
			// $employee->setEmployeeType($row['employeetype']);
			
            $caseworkers[] = $caseworker;
        }
         return $caseworkers;
    }
	
	public static function getTeachers() {
		$db = Database::getDB();	
		$query = 'select * from viewgetteachers';
		
		$result = $db->query($query);
		$teachers = array();
		foreach ($result as $row) {
            $teacher = new Employee($row['firstname'],
									$row['lastname'],
									$row['email_address'],
									$row['username'],
									$row['password'],
									$row['room_room_id']);
									
			$teacher->setEmployeeID($row['emp_id']);
			// $employee->setPhoneNum($row['PhoneNumber']);
			// $employee->setAddress($row['Address']);
			// $employee->setEmployeeType($row['employeetype']);
			
            $teachers[] = $teacher;
        }
		
		return $teachers;
	}
}
?>