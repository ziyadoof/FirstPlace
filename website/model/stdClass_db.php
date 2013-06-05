<?php
class StdClassDB {
    public static function getStdClasses() {
       $db = Database::getDB();
	   
	   $query = 'select * from StdClass';
	   
	   //Get the results into array
		$result = $db->query($query);
		$grades2 = array();
		foreach ($result as $row) {
            $grade = new StdClass2($row['stdC_id'], $row['ClassName']);
			$grades2[] = $grade;
        }
        return $grades2;
    }
    
     public static function getStdClassById($stdClass_id) {
        $db = Database::getDB();
		
		//This is a view
        $query = "SELECT * FROM StdClass
                  WHERE stdC_id ='$stdClass_id'";
        $result = $db->query($query);
		
        $row = $result->fetch();
		$stdClass = new StdClass2($row['stdC_id'],
								  $row['ClassName']);

		return $stdClass;
    }
    
	public static function getStdClassByClass($stdClass_id) {
         //TODO
        
    }
    
	public static function addStdClass($stdClassRow) {
      	$db = Database::getDB();
		
		$newstdClassName = $stdClassRow->getClassName();
		
		$addstdClassquery =
			"INSERT INTO stdClass
				(ClassName)
			VALUES
				('$newstdClassName')";
		
		$row_count = $db->exec($addstdClassquery);
        return $row_count;
    }
        
    
	
	public static function updateStdClass($stdClass) {
		$db = Database::getDB();
		
		$stdClass_id = $stdClass->getStdClass_id();
		$stdClass_name = $stdClass->getClassName();
	
		$query = 
			"UPDATE stdClass
			SET ClassName = '$stdClass_name'
			WHERE stdC_id = '$stdClass_id'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
}
?>