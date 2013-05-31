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

		$firstname = $employee->getFirstName();
		$lastname = $employee->getLastName();
		$email_address = $employee->getEmail();
		$username = $employee->getUserName();
		$password = $employee->getPassword();
		$classroom = $employee->getRoom();
		
		$query =
			"INSERT INTO employee
				(FirstName, LastName, email_Address, password, username)
			VALUES
				('$firstname', '$lastname', '$email_address', '$password', '$username')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}
?>