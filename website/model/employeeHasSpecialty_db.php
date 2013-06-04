<?php
class EmployeeHasSpecialtyDB {

    public static function getSpecialty($specialty_id) {
       //TODO
        
    }
    
	
	public static function addSpecialtyToEmployee($LinkingRow) {
		$db = Database::getDB();
		
		$EmpID = $LinkingRow->getEmp_id();
		$SpesID = $LinkingRow->getSpecialty_id();
		$SpecSD = $LinkingRow->getSpecialtyStartDate();
		$SpecED = $LinkingRow->getSpecialtyEndDate();
		
		$query = 
				"INSERT INTO employee_has_specialty
					(Employee_emp_id, Specialty_S_ID, SpecStartDate, SpecEndDate )
				VALUES
					('$EmpID', '$SpesID', '$SpecSD', '$SpecED')";
		$row_count = $db->exec($query);
		return $row_count;
    }

	public static function getSpecialtiesForEmp($emp_id) {
        
		$db = Database::getDB();
		
        $query = "SELECT * FROM EmployeeHasSpecialties_View WHERE emp_id = '$emp_id'";
        $result = $db->query($query);
        $Specialties = array();
        foreach ($result as $row) {
            $spes = new EmployeeHasSpecialty($row['emp_id'],
                             $row['S_ID'],
							 $row['SpecStartDate']);
			$spes->setSpecialtyEndDate($row['SpecEndDate']);
			$spes->setSpecialtyType($row['Type']);
			$spes->setSpecialtyName($row['Name']);
            $Specialties[] = $spes;
        }
        return $Specialties;			
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