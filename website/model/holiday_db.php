<?php
class HolidayDB {
    public static function getHoliday() {
       //TODO
        
    }
    
     public static function getHolidaysBysYear($SchoolYearID) {
		$db = Database::getDB();
        
		$query = "SELECT holi_id, SchoolYear_sy_id, StartDate, EndDate, Name FROM holiday WHERE SchoolYear_sy_id = '$SchoolYearID' ORDER BY StartDate";
		
		//Get the results into array
		$result = $db->query($query);
		$holidays = array();
		foreach ($result as $row) {
            $holiday = new Holiday($row['holi_id'],
									$row['SchoolYear_sy_id'],
									$row['StartDate'],
									$row['EndDate']);
			$holiday->setName($row['Name']);
            $holidays[] = $holiday;
        }
		return $holidays;
    }
    
    
        public static function addHoliday($holi_id) {
       //TODO
        
    }
	
	public static function updateHoliday($holi_id) {
       //TODO
        
    }
}
?>