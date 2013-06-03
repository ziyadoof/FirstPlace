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
							 $row['Name'],
							 $row['Start_Date'],
							 $row['End_Date']);
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
							 $row['Name'],
							 $row['Start_Date'],
							 $row['End_Date']);
		return $spes;  
        
    }
    
    public static function updateSpecialty($spesRow) {
		
		$db = Database::getDB();
		
		$sID = $spesRow->getSpecialty_id();
		$sType = $spesRow->getType();
		$sName = $spesRow->getName();
		$sSD = $spesRow->getStart_date();
		$sED = $spesRow->getEnd_date();
	
		$query = 
			"UPDATE specialty
			SET Type = '$sType',
				Name = '$sName',
				Start_Date = '$sSD',
				End_Date = '$sED'
			WHERE S_ID = '$sID'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
    
	
    public static function addSpecialty($specialtyRow) {
		
		$db = Database::getDB();
		
		$spsType = $specialtyRow->getType();
		$spsName = $specialtyRow->getName();
		$spsSD = $specialtyRow->getStart_date();
		$spsED = $specialtyRow->getEnd_date();
		
		$query =
			"INSERT INTO specialty
				(Type, Name, Start_Date, End_Date)
			VALUES
				('$spsType', '$spsName', '$spsSD', '$spsED')";
		
		$row_count = $db->exec($query);
        return $row_count; 
    }
	
	public static function deleteSpecialty($specialty_id) {
       //TODO
        
    }
}
?>