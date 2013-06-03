<?php
class SchoolYearDB {
    public static function getSchoolYear() {
       $db = Database::getDB();
	   
	   $query = 'select sy_id, Name from SchoolYear';
	   
	   //Get the results into array
		$result = $db->query($query);
		$schoolyears = array();
		foreach ($result as $row) {
            $year = new SchoolYear($row['sy_id'], $row['Name']);
			$schoolyears[] = $year;
        }
        return $schoolyears;
    }
    
     public static function getSchoolYearByYear($sy_id) {
         //TODO
        
    }
    
    
        public static function addSchoolYear($sy_id) {
       //TODO
        
    }
	
	public static function updateSchoolYear($sy_id) {
       //TODO
        
    }
}
?>