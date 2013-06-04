<?php
class EmployeeHasSpecialtyDB {

    public static function getSpecialty($specialty_id) {
       //TODO
        
    }
    
	
	public static function addSpecialtyToEmployee($LinkingRow) {
		$db = Database::getDB();
		
		$EmpID = $LinkingRow->getEmp_id();
		$SpesID = $LinkingRow->getSpecialty_id();
	
		$query = 
				"INSERT INTO employee_has_specialty
					(Employee_emp_id, Specialty_S_ID)
				VALUES
					('$EmpID', '$SpesID')";
		$row_count = $db->exec($query);
		return $row_count;
    }
	
	
	public static function deleteSpecialtyFromEmployee($LinkingRow) {
	   $db = Database::getDB();
	   
	   	$EmpID = $LinkingRow->getEmp_id();
		$SpesID = $LinkingRow->getSpecialty_id();
		
	   $query = "DELETE FROM employee_has_specialty WHERE Employee_emp_id = '$EmpID' AND Specialty_S_ID = '$SpesID'";
	   
	   $row_count = $db->exec($query);
	   return $row_count;
    }
	
}
?>