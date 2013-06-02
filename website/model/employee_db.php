<?php
class EmployeeDB {
    public static function getEmployees() {
       //TODO
        return $employees;
    }
    
    public static function getEmployee($s_id) {
        //TODO
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
				('$classroom', '$firstname', '$lastname', 'phoneNum', 'address', '$email_address', '$password', '$username', '$empType')";

		$WithoutRoomQuery =
			"INSERT INTO employee
				(FirstName, LastName, PhoneNumber, Address, email_Address, password, username, employeetype)
			VALUES
				('$firstname', '$lastname', 'phoneNum', 'address', '$email_address', '$password', '$username', '$empType')";
		
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