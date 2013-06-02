<?php
class EmployeeDB {
    public static function getEmployees() {
		$db = Database::getDB();
        
		$query = 'select * from EmployeeListWithRoom order by LastName'; //This is a view
		
		//Get the results into array
		$result = $db->query($query);
		$employees = array();
		foreach ($result as $row) {
            $employee = new Employee($row['FirstName'],
									$row['LastName'],
									$row['email_Address'],
									$row['username'],
									$row['password'],
									$row['Location']);
			$employee->setPhoneNum($row['PhoneNumber']);
			$employee->setEmployeeID($row['emp_id']);
			$employee->setAddress($row['Address']);
			$employee->setEmployeeType($row['employeetype']);
			
            $employees[] = $employee;
        }
		
		return $employees;
    }
    
    public static function getEmployee($e_id) {

		$db = Database::getDB();
        
		$query = "SELECT * FROM EmployeeListWithRoom
                  WHERE emp_id = '$e_id'";
        $result = $db->query($query);
        $row = $result->fetch();
        
		$employee = new Employee($row['FirstName'],
								$row['LastName'],
								$row['email_Address'],
								$row['username'],
								$row['password'],
								$row['Location']);
		$employee->setPhoneNum($row['PhoneNumber']);
		$employee->setEmployeeID($row['emp_id']);
		$employee->setAddress($row['Address']);
		$employee->setEmployeeType($row['employeetype']);
		
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
		$empType = $employee->getEmployeeType();
		
		$WithRoomQuery =
			"INSERT INTO employee
				(Room_Room_ID, FirstName, LastName, PhoneNumber, Address, email_Address, password, username, employeetype)
			VALUES
				('$classroom', '$firstname', '$lastname', '$phoneNum', '$address', '$email_address', '$password', '$username', '$empType')";

		$WithoutRoomQuery =
			"INSERT INTO employee
				(FirstName, LastName, PhoneNumber, Address, email_Address, password, username, employeetype)
			VALUES
				('$firstname', '$lastname', '$phoneNum', '$address', '$email_address', '$password', '$username', '$empType')";
		
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
}
?>