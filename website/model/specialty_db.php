<?php
class SpecialtyDB {

    public static function getSpecialties() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM specialty
                  ORDER BY Type';
        $result = $db->query($query);
        $Specialties = array();
        foreach ($result as $row) {
            $spes = new Specialty($row['S_ID'],
                             $row['Type'],
							 $row['Name']);
            $Specialties[] = $spes;
        }
        return $Specialties;
    }

    public static function getSpecialty($specialty_id) {
        $db = Database::getDB();
		
        $query = "SELECT * FROM specialty
                  WHERE S_ID ='$specialty_id'";
        $result = $db->query($query);
		
        $row = $result->fetch();
		$spes = new Specialty($row['S_ID'],
                             $row['Type'],
							 $row['Name']);
		return $spes;  
        
    }
    
    public static function updateSpecialty($spesRow) {
		
		$db = Database::getDB();
		
		$sID = $spesRow->getSpecialty_id();
		$sType = $spesRow->getType();
		$sName = $spesRow->getName();
	
		$query = 
			"UPDATE specialty
			SET Type = '$sType',
				Name = '$sName'
			WHERE S_ID = '$sID'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
    
	
    public static function addSpecialty($specialtyRow) {
		
		$db = Database::getDB();
		
		$spsType = $specialtyRow->getType();
		$spsName = $specialtyRow->getName();
		
		$query =
			"INSERT INTO specialty
				(Type, Name)
			VALUES
				('$spsType', '$spsName')";
		
		$row_count = $db->exec($query);
        return $row_count; 
    }
	
	public static function deleteSpecialty($specialty_id) {
       //TODO
        
    }

	
	public static function getSpecialtiesNotForEmp($emp_id) {
        
		$db = Database::getDB();
		
        $query = "SELECT S_ID, Type, Name FROM specialty
					WHERE NOT EXISTS (
					SELECT Employee_emp_id FROM employee_has_specialty 
						WHERE employee_has_specialty.Specialty_S_ID = specialty.S_ID AND Employee_emp_id = '$emp_id')";
        $result = $db->query($query);
        $Specialties = array();
        foreach ($result as $row) {
            $spes = new Specialty($row['S_ID'],
                             $row['Type'],
							 $row['Name']);
            $Specialties[] = $spes;
        }
        return $Specialties;			
    }
	
}
?>