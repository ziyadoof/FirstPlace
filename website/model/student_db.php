<?php
class StudentDB {
    public static function getStudents() {
		$db = Database::getDB();
        
		$query = 'select * from StudentListWithClass order by studenttype'; //This is a view
		
		//Get the results into array
		$result = $db->query($query);
		$students = array();
		foreach ($result as $row) {
            $student = new Student($row['FirstName'],
			$row['LastName'],
			$row['Address'],
			$row['PhoneNumber']);
			$student->setPhoneNum($row['PhoneNumber']);
			$student->setStudentID($row['st_ID']);
                        $student->setEmail($row['EmailAddress']);
			$student->setGrade($row['Grade']);
                        $student->setStartDate($row['StartDate']);
 			
            $students[] = $student;
        }
		
		return $students;
    }
    
    public static function getStudent($s_id) {

		$db = Database::getDB();
        
		$query = "SELECT * FROM StudentListWithClass
                  WHERE st_id = '$s_id'";
        $result = $db->query($query);
        $row = $result->fetch();
        
            $student = new Student($row['FirstName'],
			$row['LastName'],
			$row['Address'],
			$row['PhoneNumber']);
			$student->setPhoneNum($row['PhoneNumber']);
			$student->setStudentID($row['st_ID']);
                        $student->setEmail($row['EmailAddress']);
			$student->setGrade($row['Grade']);
                        $student->setStartDate($row['StartDate']);
		
		return $student;
    }

    public static function addStudent($student) {
        $db = Database::getDB();
		
		$casework = $student->getCaseworker();
		$firstname = $student->getFirstName();
		$lastname = $student->getLastName();
		$phoneNum = $student->getPhoneNum();
		$address = $student->getAddress();
		$email_address = $student->getEmail();
		$grade = $student->getGrade();
		$stDate = $student->getStartDate();
		$fpclass = $student->getClas();
		
		$WithCaseworkQuery =
			"INSERT INTO student
				(FirstName, LastName, Grade, PhoneNumber, Address, email_Address, YearStarted, Employee_emp_id)
			VALUES
				('$firstname', '$lastname', '$grade', '$phoneNum', '$address', '$email_address', '$stDate', '$casework')";

		$WithoutCaseWorkerQuery =
			"INSERT INTO student
				(FirstName, LastName, Grade, PhoneNumber, Address, email_Address, YearStarted)
			VALUES
				('$firstname', '$lastname', '$grade', '$phoneNum', '$address', '$email_address', '$stDate')";

                $WithClassQuery =
			"INSERT INTO studentClass
				(FirstName, LastName)
			VALUES
				('$firstname', '$fpclass')";

		//Check if the room was specified by the user or not
	        if ($caseworker == "NotSpecified")
		{
			$row_count = $db->exec($WithoutClassQuery);
		} else 
		{
			$row_count = $db->exec($WithoutCaseWorkerQuery);
		}
                
                if($fpclass != "NotSpecified")
                {
                    $row_count = $db->exec($WithClassQuery);
                }
        return $row_count;
    }

	public static function updateStudent($student) {
		$db = Database::getDB();
		
		$e_id = $student->getStudentID();
		$classroom = $student->getRoom();
		$firstname = $student->getFirstName();
		$lastname = $student->getLastName();
		$phoneNum = $student->getPhoneNum();
		$address = $student->getAddress();
		$emailAddress = $student->getEmail();
		$username = $student->getUserName();
		$password = $student->getPassword();
		$empType = $student->getStudentType();		
		
		$queryWithRoomSpecified = 
				"UPDATE student
				SET emp_id = emp_id ,
					Room_Room_ID = '$classroom' ,
					FirstName = '$firstname' ,
					LastName =  '$lastname',
					PhoneNumber = '$phoneNum' ,
					Address = '$address' ,
					email_Address = '$emailAddress'
				WHERE emp_id = '$e_id'";
				
		$queryWithRoomNotSpecified = 
				"UPDATE student
				SET emp_id = emp_id ,
					Room_Room_ID = NULL ,
					FirstName = '$firstname' ,
					LastName =  '$lastname',
					PhoneNumber = '$phoneNum' ,
					Address = '$address' ,
					email_Address = '$emailAddress'
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

}
?>