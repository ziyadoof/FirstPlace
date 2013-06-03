<?php
class StdClassDB {
    public static function getStdClass() {
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
    
     public static function getStdClassByStudent($stdClass_id) {
         //TODO
        
    }
    
	public static function getStdClassByClass($stdClass_id) {
         //TODO
        
    }
    
        public static function addStdClass($stdClass_id) {
       //TODO
        
    }
	
	public static function updateStdClass($stdClass_id) {
       //TODO
        
    }
}
?>