<?php
class StudentDB {
    public static function getStudents() {
		$db = Database::getDB();        
		$query = 'select * from StudentWithCasework order by LastName'; //Not a view
		
		//Get the results into array
		$result = $db->query($query);
		$students = array();
		foreach ($result as $row) {
            $student = new Student($row['FirstName'], 
			$row['LastName'],
			$row['Address'],
			$row['PhoneNumber']);
            
                        $student->setGrade($row['Grade']);
                        $student->setEmail($row['email_address']);
                        $student->setStartDate($row['YearStarted']);
                        $student->setCaseWorker($row['username']);
                        $student->setStudentID($row['s_id']);
 			
            $students[] = $student;
        }
		
		return $students;
    }
    
    public static function getStudent($s_id) {

		$db = Database::getDB();
        
		$query = "select * from StudentWithCasework
                  WHERE st_id = '$s_id'";
        $result = $db->query($query);
        $row = $result->fetch();
        
            $student = new Student($row['FirstName'],
			$row['LastName'],
			$row['Address'],
			$row['PhoneNumber']);
                        $student->setEmail($row['email_address']);
			$student->setGrade($row['Grade']);
                        $student->setStartDate($row['YearStarted']);
                        $student->setCaseWorker($row['Employee_emp_id']);
                        $student->setStudentID($row['s_id']);
                        
		return $student;
    }

    public static function addStudent($student) {
        $db = Database::getDB();
		
		$casework = $student->getCaseworker();
		$firstname = $student->getFirstName();
		$lastname = $student->getLastName();
		$phoneNum = $student->getPhoneNum();
		$address = $student->getAddress();
		$emailAddress = $student->getEmail();
		$grad = $student->getGrade();
		$stDate = $student->getStartDate();
		$fpclass = $student->getClass();
                
		
		$WithCaseWorkerQuery =
			"INSERT INTO student
				(FirstName, LastName, Grade, PhoneNumber, Address, email_Address, YearStarted, Employee_emp_id)
			VALUES
				('$firstname', '$lastname', '$grad', '$phoneNum', '$address', '$emailAddress', '$stDate', '$casework')";

		$WithoutCaseWorkerQuery =
			"INSERT INTO student
				(FirstName, LastName, Grade, PhoneNumber, Address, email_Address, YearStarted)
			VALUES
				('$firstname', '$lastname', '$grad', '$phoneNum', '$address', '$emailAddress', '$stDate')";

                $WithClassQuery =
			"INSERT INTO studentClass
				(Student_s_id, Class_c_id)
			VALUES
				('$st_id', '$fpclass')";

		//Check if the caseworker was specified by the user or not
	        if ($casework == "NotSpecified")
		{
			$row_count = $db->exec($WithoutCaseWorkerQuery);
                        $st_id = $mysqli->insert_id;
		} else 
		{
			$row_count = $db->exec($WithCaseWorkerQuery);
                        $st_id = $mysqli->insert_id;
		}
                //Check if class was specified
                if($fpclass != "NotSpecified")
                {
          
                    $row_count = $db->exec($WithClassQuery);
                }
        return $row_count;
    }

	public static function updateStudent($student) {
		$db = Database::getDB();
		
		$st_id = $student->getStudentID();
		$firstname = $student->getFirstName();
		$lastname = $student->getLastName();
		$phoneNum = $student->getPhoneNum();
		$address = $student->getAddress();
		$emailAddress = $student->getEmail();
		$grade = $student->getUserName();
		$casework = $student->getCaseWorker();
		$stYear = $student->getStartDate();		
		
		$WithCaseWorkerQuery = 
				"UPDATE student
				SET s_id = s_id ,
					FirstName = '$firstname' ,
					LastName =  '$lastname',
                                        Grade = '$grade',  
					PhoneNumber = '$phoneNum' ,
					Address = '$address' ,
					email_Address = '$emailAddress'
                                        YearStarted = '$stYear', 
                                        Employee_emp_id = '$casework'
                                            
				WHERE s_id = '$st_id'";
				
		$WithoutCaseWorkerQuery = 
				"UPDATE student
				SET s_id = st_id ,
					
					FirstName = '$firstname' ,
					LastName =  '$lastname',
					Grade = '$grade',  
					PhoneNumber = '$phoneNum' ,
					Address = '$address' ,
					email_Address = '$emailAddress'
                                        YearStarted = '$stYear', 
                                        Employee_emp_id = NULL
				WHERE s_id = '$st_id'";
		
		//Check if the caseworker was specified by the user or not
	        if ($casework == "NotSpecified")
		{
			$row_count = $db->exec($WithoutCaseWorkerQuery);
		} else 
		{
			$row_count = $db->exec($WithCaseWorkerQuery);
		}
		return $row_count;
	}

}
?>