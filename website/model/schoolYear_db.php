 <?php
 class SchoolYearDB {

    public static function getSchoolYear($schoolYear_ID) {
		$db = Database::getDB();
        
		$query = "SELECT * FROM schoolyear
                  WHERE sy_id = '$schoolYear_ID'";
        $result = $db->query($query);
        $row = $result->fetch();
        
		$SY = new SchoolYear($row['sy_id'],
								$row['StartDate'],
								$row['EndDate']);
		$SY->setName($row['Name']);
		
		return $SY;
    }
	
    public static function getSchoolYears() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM schoolyear
                  ORDER BY StartDate';
        $result = $db->query($query);
        $SchoolYears = array();
        foreach ($result as $row) {
            $sy = new SchoolYear($row['sy_id'],
                             $row['StartDate'],
							 $row['EndDate']);
			$sy->setName($row['Name']);
            $SchoolYears[] = $sy;
        }
        return $SchoolYears;
    }
	
   public static function getSchoolYearByYear($sy_id) {
          //TODO
         
    }
    
	public static function addSchoolYear($SY_Row) {
        $db = Database::getDB();
		
		$YearStartDate = $SY_Row->getStartDate();
		$YearEndDate = $SY_Row->getEndDate();
		$YearName = $SY_Row->getName();
		
		$query =
			"INSERT INTO schoolyear
				(StartDate, EndDate, Name)
			VALUES
				('$YearStartDate', '$YearEndDate', '$YearName')";

		$row_count = $db->exec($query);
        return $row_count;
        
    }
 	

	public static function updateSchoolYear($schoolY_Row) {
		
		$db = Database::getDB();
		
		$schoolY_ID = $schoolY_Row->getSy_id();
		$SchoolY_SD = $schoolY_Row->getStartDate();
		$SchoolY_ED = $schoolY_Row->getEndDate();
		$SchoolY_Name = $schoolY_Row->getName();
	
		$query = 
			"UPDATE schoolyear
			SET StartDate = '$SchoolY_SD',
				EndDate = '$SchoolY_ED',
				Name = '$SchoolY_Name'
			WHERE sy_id = '$schoolY_ID'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
 }
 ?>
 
 


