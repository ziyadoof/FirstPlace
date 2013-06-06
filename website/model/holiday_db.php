<?php
class HolidayDB {
    public static function getHolidays() {
       $db = Database::getDB();
        
		$query = "SELECT holi_id, SchoolYear_sy_id, StartDate, EndDate, Name FROM holiday ORDER BY StartDate";
		
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
	
    public static function getHolidaysBysYearID_and_Date($SchoolYearID, $TodayDate) {
		$db = Database::getDB();
        
		$query = "SELECT * FROM holiday WHERE SchoolYear_sy_id = '$SchoolYearID' AND StartDate <= '$TodayDate' AND EndDate >= '$TodayDate';";
		
		//Get the results into array
		$result = $db->query($query);
        $row = $result->fetch();
        $holiday = new Holiday($row['holi_id'],
								$row['SchoolYear_sy_id'],
								$row['StartDate'],
								$row['EndDate']);
		$holiday->setName($row['Name']);
        
		return $holiday;
    }
    
    
    public static function addHoliday($RowToAdd) {
        $db = Database::getDB();
		
		$Holi_SD = $RowToAdd->getStartDate();
		$Holi_ED = $RowToAdd->getEndDate();
		$HoliName = $RowToAdd->getName();
		$YearKey = $RowToAdd->getSchoolYear_id();

		
		$query =
			"INSERT INTO holiday
				(SchoolYear_sy_id, StartDate, EndDate, Name)
			VALUES
				('$YearKey', '$Holi_SD', '$Holi_ED', '$HoliName')";

		$row_count = $db->exec($query);
        return $row_count;
    }
	
	public static function updateHoliday($holi_id) {
       //TODO
        
    }
	
	public static function deleteHoliday($holi_id) {
	   $db = Database::getDB();
	   
	   $query = "DELETE FROM holiday WHERE holi_id = '$holi_id' ";
	   $row_count = $db->exec($query);
	   return $row_count;
    }
}
?>